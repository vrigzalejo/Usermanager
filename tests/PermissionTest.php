<?php namespace Vrigzalejo\Usermanager\Tests;

use Mockery as m;
use Vrigzalejo\Usermanager\Models\Permissions\Permission;
use PHPUnit_Framework_TestCase;

class PermissionTest extends PHPUnit_Framework_TestCase
{
    public function testPermissionIdCallsIdAttribute()
    {
        $permission = new Permission;
        $permission->id = 42;

        $this->assertEquals(42, $permission->getId());
    }

    public function testPermissionNameCallsNameAttribute()
    {
        $permission = new Permission;
        $permission->name = 'Juan';

        $this->assertEquals('Juan', $permission->getName());
    }

    public function testPermissionValueCallsValueAttribute()
    {
        $permission = new Permission;
        $permission->value = 'juan-dela-cruz';

        $this->assertEquals('juan-dela-cruz', $permission->getValue());
    }

    public function testPermissionDescriptionCallsDescriptionAttribute()
    {
        $permission = new Permission;
        $permission->description = 'Juan Dela Cruz !';

        $this->assertEquals('Juan Dela Cruz !', $permission->getDescription());
    }

    /**
     * @expectedException Vrigzalejo\Usermanager\Models\Permissions\NameRequiredException
     */
    public function testValidationThrowsNameRequiredExceptionIfNoneGiven()
    {
        $permission = new Permission;
        $permission->validate();
    }

    /**
     * @expectedException Vrigzalejo\Usermanager\Models\Permissions\ValueRequiredException
     */
    public function testValidationThrowsValueRequiredException()
    {
        $permission = new Permission;
        $permission->name = 'Yeepah';
        $permission->validate();
    }

    /**
     * @expectedException Vrigzalejo\Usermanager\Models\Permissions\PermissionExistsException
     */
    public function testValidationThrowsPermissionExistsException()
    {
        $persistedPermission = m::mock('Vrigzalejo\Usermanager\Models\Permissions\Permission');
        $persistedPermission->shouldReceive('hasGetMutator')->andReturn(false);
        $persistedPermission->shouldReceive('getId')->once()->andReturn(42);

        $permission = m::mock('Vrigzalejo\Usermanager\Models\Permissions\Permission[newQuery]');
        $permission->id = 43;
        $permission->name = 'List users';
        $permission->value = 'view-users-list';

        $query = m::mock('StdClass');
        $query->shouldReceive('where')->with('value', '=', 'view-users-list')->once()->andReturn($query);
        $query->shouldReceive('first')->once()->andReturn($persistedPermission);

        $permission->shouldReceive('newQuery')->once()->andReturn($query);

        $permission->validate();
    }

    public function testValidationPermission()
    {
        $persistedPermission = m::mock('Vrigzalejo\Usermanager\Models\Permissions\Permission');
        $persistedPermission->shouldReceive('hasGetMutator')->andReturn(false);
        $persistedPermission->shouldReceive('getId')->once()->andReturn(43);

        $permission = m::mock('Vrigzalejo\Usermanager\Models\Permissions\Permission[newQuery]');
        $permission->id = 43;
        $permission->name = 'List users';
        $permission->value = 'view-users-list';

        $query = m::mock('StdClass');
        $query->shouldReceive('where')->with('value', '=', 'view-users-list')->once()->andReturn($query);
        $query->shouldReceive('first')->once()->andReturn($persistedPermission);

        $permission->shouldReceive('newQuery')->once()->andReturn($query);

        $this->assertTrue($permission->validate());
    }

}
