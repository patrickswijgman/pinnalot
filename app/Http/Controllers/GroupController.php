<?php

namespace App\Http\Controllers;

use App\Models\Group;

class GroupController extends Controller {

    function test() {
        Group::create(
            [
                'name'=>'testGroup',
                'omschrijving'=> 'This is a testGroup',
                'kind' => 'family']
        );

    }
}
