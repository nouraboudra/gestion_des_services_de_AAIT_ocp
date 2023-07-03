<div>
    <div>
        <div class="card card-statics mb-30">
            <div class="card-body">
                <h5 class="card-title">{{$data[$counter]->title}}</h5>
                @foreach (preg_split('/(-)/',$data[$counter]->answers) as $index=>$answer)
                    <div class="custom-control custom-radio">
                        <input type="radio" name="customRadio" id="customRadio{{$index}}" class="custom-control-input">
                        <label for="customRadio{{$index}}" class="custom-control-label" wire:click="nextQuestion({{$data[$counter]->id}}, {{$data[$counter]->score}}, '{{$answer}}', '{{$data[$counter]->right_answer}}')">{{$answer}}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
