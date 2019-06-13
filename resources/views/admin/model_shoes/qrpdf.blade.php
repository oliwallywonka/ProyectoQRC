






        @foreach ($model_shoes as $m)




                    <br>

                        <img   src="images/model_images/qrcode{{$m->id}}.png" width="500" height="500" alt="">


                    <div>Modelo: {{$m->model}}</div>



        @endforeach


