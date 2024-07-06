<?php

namespace WPD_Team;

/**
 * Installer class
 */
class Installer{
    public function run(){
        $this->add_version();
    }

    public function add_version(){
        $installed = get_option( "wpd_team_installed" );

        if ( !$installed ) {
            update_option( 'wpd_team_installed', time() );
        }

        update_option( 'wpd_team_installed', WPD_TEAM_VERSION );
    }

}