<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    // Public: display all non-archived tasks
    public function index()
    {
        $taskModel = new TaskModel();

        $tasks = $taskModel
            ->where('is_archived', false)
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks/index', [
            'tasks' => $tasks
        ]);
    }

    // Protected: show create form
    public function newTask()
    {
        helper(['form']);

        return view('tasks/new');
    }

    // Protected: create a new task
    public function create()
    {
        helper(['form']);

        $rules = [
            'title' => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title'        => $this->request->getPost('title'),
            'status'       => 'pending',
            'task_date'    => $this->request->getPost('task_date'),
            'created_at'   => date('Y-m-d H:i:s'),
            'is_archived'  => false,
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task created successfully.');
    }

    // Protected: show edit form
    public function edit($id)
    {
        helper(['form']);

        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('id', $id)
            ->where('is_archived', false)
            ->first();

        if (!$task) {
            return redirect()->to('/tasks')
                ->with('error', 'Task not found.');
        }

        return view('tasks/edit', [
            'task' => $task
        ]);
    }

    // Protected: update an existing task
    public function update($id)
    {
        helper(['form']);

        $rules = [
            'title' => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'status' => 'required|in_list[pending,completed]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('id', $id)
            ->where('is_archived', false)
            ->first();

        if (!$task) {
            return redirect()->to('/tasks')
                ->with('error', 'Task not found.');
        }

        $taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task updated successfully.');
    }

    // Protected: archive a task instead of deleting the row
    public function delete($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('id', $id)
            ->where('is_archived', false)
            ->first();

        if (!$task) {
            return redirect()->to('/tasks')
                ->with('error', 'Task not found.');
        }

        $taskModel->update($id, [
            'is_archived' => true,
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task archived successfully.');
    }
}