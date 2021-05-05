<?php
namespace App\Services;

use Illuminate\Support\Facades\Gate;

class checkpermissionrole{
    public function gatedefinerole()
    {
        $this->checkcategory();
        $this->checkproduct();
        $this->checkdashboard();
        $this->checkorder();
        $this->checkaccount();
        
    }
    public function checkcategory()
    {
        
        Gate::define('category-list',function($user){
            return $user->checkPermissionAccess('list_category');
        });
        Gate::define('category-delete',function($user){
            return $user->checkPermissionAccess('delete_category');
        });
        Gate::define('category-edit',function($user){
            return $user->checkPermissionAccess('edit_category');
        });
        Gate::define('category-add',function($user){
            return $user->checkPermissionAccess('add_category');
        });
    }
    public function checkproduct()
    {
        
        Gate::define('product-list',function($user){
            return $user->checkPermissionAccess('list_product');
        });
        Gate::define('product-delete',function($user){
            return $user->checkPermissionAccess('delete_product');
        });
        Gate::define('product-edit',function($user){
            return $user->checkPermissionAccess('edit_product');
        });
        Gate::define('product-add',function($user){
            return $user->checkPermissionAccess('add_product');
        });
    }
    public function checkorder()
    {
        
        Gate::define('order-list',function($user){
            return $user->checkPermissionAccess('list_order');
        });
        Gate::define('order-delete',function($user){
            return $user->checkPermissionAccess('delete_order');
        });
        Gate::define('order-edit',function($user){
            return $user->checkPermissionAccess('edit_order');
        });
        Gate::define('order-add',function($user){
            return $user->checkPermissionAccess('add_order');
        });
    }
    public function checkaccount()
    {
        
        Gate::define('accout-list',function($user){
            return $user->checkPermissionAccess('list_accout');
        });
        Gate::define('accout-delete',function($user){
            return $user->checkPermissionAccess('delete_accout');
        });
        Gate::define('accout-edit',function($user){
            return $user->checkPermissionAccess('edit_accout');
        });
        Gate::define('accout-add',function($user){
            return $user->checkPermissionAccess('add_accout');
        });
    }
    public function checkdashboard()
    {
        
        Gate::define('dashboard-list',function($user){
            return $user->checkPermissionAccess('list_dashboard');
        });
        
    }

}
