<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Sprint;

class TasksWithoutEstimate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {        
        /*
            SELECT count(*) FROM `sprints` s 
            left join backlogs b on s.id=b.sprint_id
            left join estimates e on b.id=e.task_id
            WHERE s.name='20-15' and e.estimation is NULL
        */
     
        $backlog = Sprint::where('name', '=', $value)->firstOrFail();
        $t_without_est = $backlog->leftJoin('backlogs', 'sprints.id', '=', 'backlogs.sprint_id')
        ->leftJoin('estimates', 'backlogs.id', '=', 'estimates.task_id')
        ->where('sprints.id', $backlog->id)
        ->whereNull('estimates.estimation')
        ->count();        
        return   $t_without_est<=0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'В спринте есть задачи без оценки.';
    }
}
