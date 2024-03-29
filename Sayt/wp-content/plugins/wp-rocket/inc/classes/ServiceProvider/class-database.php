<?php
namespace WP_Rocket\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;

/**
 * Service Provider for database optimization
 *
 * @since 3.3
 * @author Remy Perona
 */
class Database extends AbstractServiceProvider {

	/**
	 * The provides array is a way to let the container
	 * know that a service is provided by this service
	 * provider. Every service that is registered via
	 * this service provider must have an alias added
	 * to this array or it will be ignored.
	 *
	 * @var array
	 */
	protected $provides = [
		'db_optimization_process',
		'db_optimization',
	];

	/**
	 * Registers the option array in the container
	 *
	 * @since 3.3
	 * @author Remy Perona
	 *
	 * @return void
	 */
	public function register() {
		$this->getContainer()->add( 'db_optimization_process', 'WP_Rocket\Admin\Database\Optimization_Process' );
		$this->getContainer()->add( 'db_optimization', 'WP_Rocket\Admin\Database\Optimization' )
			->withArgument( $this->getContainer()->get( 'db_optimization_process' ) );
	}
}
