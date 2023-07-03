<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Livewire\Component;
use App\Models\Question;

class ShowQuestion extends Component
{

    public $exam_id, $data, $counter = 0, $questioncount = 0;

    public function render()
    {

        $this->data = Question::where('exam_id',$this->exam_id)->get();
        $this->questioncount = $this->data->count();
        return view('livewire.show-question',['data']);
    }

    public function nextQuestion($question_id, $score, $answer, $right_answer)
    {
        $stunote = Note::where('exam_id', $this->exam_id)
            ->first();
        // insert
        if ($stunote == null) {
            $note = new Note();
            $note->exam_id = $this->exam_id;
            $note->question_id = $question_id;
            if (strcmp(trim($answer), trim($right_answer)) === 0) {
                $note->score += $score;
            } else {
                $note->score += 0;
            }
            $note->date = date('Y-m-d');
            $note->save();
        } else {

            // update
            // if ($stunote->question_id >= $this->data[$this->counter]->id) {
            //     $stunote->score = 0;
            //     $stunote->abuse = '1';
            //     $stunote->save();
            //     toastr()->error('test');
            //     return redirect('candidat_exams');
            // } else {

            //     $stunote->question_id = $question_id;
            //     if (strcmp(trim($answer), trim($right_answer)) === 0) {
            //         $stunote->score += $score;
            //     } else {
            //         $stunote->score += 0;
            //     }
            //     $stunote->save();
            // }
            
            $stunote->question_id = $question_id;
                 if (strcmp(trim($answer), trim($right_answer)) === 0) {
                    $stunote->score += $score;
                } else {
                    $stunote->score += 0;
                }
                $stunote->save();

        }

        if ($this->counter < $this->questioncount - 1) {
            $this->counter++;
        } else {
            toastr()->success("Vous avez finit l'examen");
            return redirect('candidat_exams');
        }

    }
}
