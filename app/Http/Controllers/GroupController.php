<?php

namespace App\Http\Controllers;

use App\Models\Group;

class GroupController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    function test() {
        Group::create(
            [
                'name'=>'testGroup',
                'description'=> 'This is a testGroup',
                'kind' => 'family']
        );

    }
}
