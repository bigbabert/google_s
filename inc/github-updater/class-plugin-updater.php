<?php
/**
 * Google_S GitHub Updater
 *
 * @package Google_S
 */
class GitHub_Plugin_Updater extends GitHub_Updater {

	/**
	 * Constructor.
	 */
	public function __construct() {

		// This MUST come before we get details about the plugins so the headers are correctly retrieved
		GitHub_Updater_GitHub_API::add_headers();
		// Get details of GitHub-sourced plugins
		$this->config = $this->get_plugin_meta();
		
		if ( empty( $this->config ) ) {
			return false;
		}
		if ( isset( $_GET['force-check'] ) && '1' === $_GET['force-check'] ) {
			$this->delete_all_transients( 'plugins' );
		}

		foreach ( (array) $this->config as $plugin ) {
			switch( $plugin->type ) {
				case 'github_plugin':
					$repo_api = new GitHub_Updater_GitHub_API( $plugin );
					break;
				case 'bitbucket_plugin':
					$repo_api = new GitHub_Updater_BitBucket_API( $plugin );
					break;
			}

			$this->{$plugin->type} = $plugin;
			$this->set_defaults( $plugin->type );

			if ( $repo_api->get_remote_info( basename( $plugin->slug ) ) ) {
				$repo_api->get_repo_meta();
				$repo_api->get_remote_tag();
				$changelog = $this->get_changelog_filename( $plugin->type );
				if ( $changelog ) {
					$repo_api->get_remote_changes( $changelog );
				}
				$plugin->download_link = $repo_api->construct_download_link();
			}
		}

		$this->make_force_check_transient( 'plugins' );

		add_filter( 'pre_set_site_transient_update_plugins', array( $this, 'pre_set_site_transient_update_plugins' ) );
		add_filter( 'plugins_api', array( $this, 'plugins_api' ), 99, 3 );
		add_filter( 'upgrader_source_selection', array( $this, 'upgrader_source_selection' ), 10, 3 );
		add_filter( 'http_request_args', array( $this, 'no_ssl_http_request_args' ), 10, 2 );

		GitHub_Updater_Settings::$ghu_plugins = $this->config;
	}


	/**
	 * Put changelog in plugins_api, return WP.org data as appropriate
	 *
	 * @param $false
	 * @param $action
	 * @param $response
	 *
	 * @return mixed
	 */
	public function plugins_api( $false, $action, $response ) {
		if ( ! ( 'plugin_information' === $action ) ) {
			return $false;
		}

		$wp_repo_data = get_site_transient( 'ghu-' . md5( $response->slug . 'wporg' ) );
		if ( ! $wp_repo_data ) {
			$wp_repo_data = wp_remote_get( 'http://api.wordpress.org/plugins/info/1.0/' . $response->slug );
			if ( is_wp_error( $wp_repo_data ) ) {
				return false;
			}

			set_site_transient( 'ghu-' . md5( $response->slug . 'wporg' ), $wp_repo_data, ( 12 * HOUR_IN_SECONDS ) );
		}

		$wp_repo_body = unserialize( $wp_repo_data['body'] );
		if ( is_object( $wp_repo_body ) ) {
			$response = $wp_repo_body;
		}

		foreach ( (array) $this->config as $plugin ) {
			if ( $response->slug === $plugin->repo ) {
				if ( is_object( $wp_repo_body ) && 'master' === $plugin->branch ) {
					return $response;
				}

				$response->slug          = $plugin->repo;
				$response->plugin_name   = $plugin->name;
				$response->name          = $plugin->name;
				$response->author        = $plugin->author;
				$response->homepage      = $plugin->uri;
				$response->version       = $plugin->remote_version;
				$response->sections      = $plugin->sections;
				$response->requires      = $plugin->requires;
				$response->tested        = $plugin->tested;
				$response->downloaded    = $plugin->downloaded;
				$response->last_updated  = $plugin->last_updated;
				$response->rating        = $plugin->rating;
				$response->num_ratings   = $plugin->num_ratings;
				$response->download_link = $plugin->download_link;
			}
		}

		return $response;
	}

	/**
	 * Hook into pre_set_site_transient_update_plugins to update from GitHub.
	 *
	 * @param $transient
	 *
	 * @return mixed
	 */
	public function pre_set_site_transient_update_plugins( $transient ) {
		if ( empty( $transient->checked ) ) {
			return $transient;
		}

		foreach ( (array) $this->config as $plugin ) {

			if ( $this->can_update( $plugin ) ) {
				$response = array(
					'slug'        => dirname( $plugin->slug ),
					'new_version' => $plugin->remote_version,
					'url'         => $plugin->uri,
					'package'     => $plugin->download_link,
				);

				// if branch is 'master' and plugin is in wp.org repo then pull update from wp.org
				if ( isset( $transient->response[ $plugin->slug]->id ) && 'master' === $plugin->branch ) {
					continue;
				}

				$transient->response[ $plugin->slug ] = (object) $response;
			}
		}

		return $transient;
	}

}
