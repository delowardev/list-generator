/* global process __dirname */
const DEV = 'production' !== process.env.NODE_ENV;

/**
 * Plugins
 */
const path = require( 'path' );

const CleanWebpackPlugin = require( 'clean-webpack-plugin' );
const DependencyExtractionWebpackPlugin = require( '@wordpress/dependency-extraction-webpack-plugin' );
const TerserPlugin = require( 'terser-webpack-plugin' );

// JS Directory path.
const JSDir = path.resolve( __dirname, 'src/js' );
const BUILD_DIR = path.resolve( __dirname, 'build' );
const entry = require('./entry.config');

const output = {
	path: BUILD_DIR,
	filename: DEV ? 'js/[name].js' : 'js/[name].js'
};

/**
 * Note: argv.mode will return 'development' or 'production'.
 */
const plugins = ( argv ) => [
	new CleanWebpackPlugin( [ BUILD_DIR ] ),
	new DependencyExtractionWebpackPlugin( {
		injectPolyfill: true,
		combineAssets: true
	} ),
];

const rules = [
	{
		test: /\.js$/,
		include: [ JSDir ],
		use: 'babel-loader'
	}
];

const optimization = [
	new TerserPlugin()
];

module.exports = ( env, argv ) => ( {
	entry: entry,
	output: output,
	plugins: plugins( argv ),
	devtool: 'source-map',

	module: {
		'rules': rules
	},

	optimization: {
		minimizer: optimization
	},

	externals: {
		jquery: 'jQuery'
	}
} );
