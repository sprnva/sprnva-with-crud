<?php

namespace App\Controllers;

use App\Core\Request;

class CrudController
{
    protected $pageTitle;

    public function index()
    {
        $pageTitle = "CRUD";

        $cruddata = DB()->selectLoop("*", "test")->get();

        // display GUI of crud index
        return view('/crud/index', compact('pageTitle', 'cruddata'));
    }

    public function store()
    {
        // the request will be unique to test table
        // [means no duplicated in test table] 
        $request = Request::validate('', [
            "title" => ['required', 'unique:test'],
            "description" => ['required', 'unique:test'],
        ]);

        if (empty($request['validationError'])) {

            $store_data = [
                'title' => "$request[title]",
                'description' => "$request[description]"
            ];

            // test is the table in our database
            $result = DB()->insert('test', $store_data);

            // echo the response we get from our query
            // insert query output will be 1 = inserted/ok , 0 = error
            echo json_encode($result);
        } else {

            // echo the validationError
            echo json_encode($request['validationError']);
        }
    }

    public function edit($id)
    {
        $pageTitle = "CRUD EDIT";

        $data = DB()->select("*", "test", "id = '$id'")->get();

        // display the GUI of the edit page
        return view('/crud/edit', compact('pageTitle', 'data'));
    }

    public function update()
    {
        $id = $_REQUEST['crud_id'];

        // the request will be unique to test table but disregard the same id
        // [means no duplicated in test table but disregard the same id] 
        $request = Request::validate('', [
            "title" => ['required', 'unique:test,id,' . $id],
            "description" => ['required', 'unique:test,id,' . $id],
        ]);

        if (empty($request['validationError'])) {

            $update_data = [
                'title' => "$request[title]",
                'description' => "$request[description]"
            ];

            $result = DB()->update('test', $update_data, "id = '$id'");

            // echo the response we get from our query
            // update query output will be 1 = inserted/ok , 0 = error
            echo json_encode($result);
        } else {

            // echo the validationError
            echo json_encode($request['validationError']);
        }
    }

    public function deleteItem()
    {
        // nothing to validate? just leave it blank
        $request = Request::validate();

        $result = DB()->delete('test', "id = '$request[id]'");

        // echo the response we get from our query
        // delete query output will be 1 = inserted/ok , 0 = error
        echo json_encode($result);
    }
}
