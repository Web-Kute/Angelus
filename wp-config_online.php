<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'angelusplongee');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'angelusplongee');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '56zacharie');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'angelusplongee.mysql.db');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'qO4EesHKDvQOmLyY/0Dfm5xrTDoeVPagw483NSmNCtZPXOr7mdY1jBv35x3GyQbKGaVRrQoaytrsiUZovsZwrA==');
define('SECURE_AUTH_KEY',  '0MySQjdIAb2i0MqaQsROOZDn8KGlnk+Iw6uuRsQQCKrnNJ8QWhFzvoyz2o1zvFokGPafq02dGs8MyzydKT/OGw==');
define('LOGGED_IN_KEY',    'dFSn5h6V0BLUi6vLHqr/e4hSVNp4ddlXcxZffWlW7U9VtWfYJhQPxHg4zCiTQ0twGMRwxfvRtJC+jc5ti8ZsRQ==');
define('NONCE_KEY',        '8KpI1ejj/9onUGy2F7woOliwFjMwnjXkjcyahusllpNC0s7QBLWOoviRP4Rf9AnMx0yUDYNR4J0FV4wUojQDpA==');
define('AUTH_SALT',        'euJr08mIa8NxvhcuFyW1l+Xijnh8TzschPlwDaVMhk6Rgx5+Zijehjhy49mse+c6kcmPn0dLDKj3RL0T/n14tA==');
define('SECURE_AUTH_SALT', 'aYLAc4kywP7lt0/dfMh9sMtaxOvBIc/yTSCH+f0k0vte+DEX11OWJ21Fwzj8pNZV/6CES15Wu4Uobnqzhtpfew==');
define('LOGGED_IN_SALT',   'sTmd8wxntHWiN1I1VjYXB749WKnW+U65bPS/aDS26s/l3zwr0ZPRmDvSfvFfdYOur8Zksw9yON6pJkvUhvWXJw==');
define('NONCE_SALT',       '+aPQm/gW6WKeAc8qDd1DTGmv+TrnuUVooQciwxVVRRhZDuQYos09yt7kRHbGi1mbE9z5apWYXp8SP+4W1b7zEg==');
/**
*Thème par défaut de WordPress MU
*
*/
define('WP_DEFAULT_THEME', 'Angelus-Plongee');
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
define( 'DISALLOW_FILE_EDIT', true );
define( 'WP_POST_REVISIONS', 5 ); // C'est bien suffisant !
define( 'AUTOSAVE_INTERVAL', 300 ); // 300/60 secondes = 5 minutes
define( 'WP_HOME', 'https://angelus-plongee.com/' );
define( 'WP_SITEURL', 'https://angelus-plongee.com/' );

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
