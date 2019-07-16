<?php

namespace App\Repositories;

use App\Project;

class ProjectRepository extends Repository
{
    /**
     * Create new instance of project repository.
     *
     * @param Project $project Project model
     */
    public function __construct(Project $project)
    {
        parent::__construct($project);
        $this->project = $project;
    }
}
