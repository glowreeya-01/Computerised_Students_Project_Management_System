<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            [
            'user_id' => '1',
            'filename' => 'first',
            'recipient' => 'Admin',
            'topic' => 'the humam mind',
            'file' => 'com.docx',
            'comment' => 'very good',
            'label' => 'Chapter',
            'status' => '1',
        ],
            [
            'user_id' => '1',
            'filename' => 'secound',
            'recipient' => 'Admin',
            'topic' => 'area of the a triangle',
            'file' => 'com.docx',
            'comment' => 'very good',
            'label' => 'Chapter',
            'status' => '1',
        ],
            [
            'user_id' => '1',
            'filename' => 'third',
            'recipient' => 'Admin',
            'topic' => 'the first thing the mind thinks',
            'file' => 'com.docx',
            'comment' => 'very good',
            'label' => 'Chapter',
            'status' => '1',
        ],
            [
            'user_id' => '2',
            'filename' => 'first',
            'recipient' => 'Admin',
            'topic' => 'mind energy of the student this days',
            'file' => 'com.docx',
            'comment' => 'very good',
            'label' => 'Chapter',
            'status' => '1',
        ],
            [
            'user_id' => '2',
            'filename' => 'secound',
            'recipient' => 'Admin',
            'topic' => 'the new summit on point',
            'file' => 'com.docx',
            'comment' => 'very good',
            'label' => 'Chapter',
            'status' => '1',
        ],
            [
            'user_id' => '2',
            'filename' => 'third',
            'recipient' => 'Admin',
            'topic' => 'the step to having a great life before 30',
            'file' => 'com.docx',
            'comment' => 'very good',
            'label' => 'Chapter',
            'status' => '1',
        ],
            [
            'user_id' => '3',
            'filename' => 'first',
            'recipient' => 'Admin',
            'topic' => 'the social media and its merits',
            'file' => 'com.docx',
            'comment' => 'very good',
            'label' => 'Chapter',
            'status' => '1',
        ],
            [
            'user_id' => '3',
            'filename' => 'secound',
            'recipient' => 'Admin',
            'topic' => 'the social status of the university of Nigeria',
            'file' => 'com.docx',
            'comment' => 'very good',
            'label' => 'Chapter',
            'status' => '1',
        ],
            [
            'user_id' => '3',
            'filename' => 'third',
            'recipient' => 'Admin',
            'topic' => 'secound term election of the president of SUG',
            'file' => 'com.docx',
            'comment' => 'very good',
            'label' => 'Chapter',
            'status' => '1',
        ],
    ];


    foreach ($projects as $project) {
        Project::create([
            'user_id' => $project['user_id'],
            'filename' => $project['filename'],
            'recipient' => $project['recipient'],
            'topic' => $project['topic'],
            'file' => $project['file'],
            'comment' => $project['comment'],
            'label' => $project['label'],
            'status' => $project['status'],
        ]);
    }


    }
}
