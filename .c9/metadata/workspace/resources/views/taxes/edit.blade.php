{"filter":false,"title":"edit.blade.php","tooltip":"/resources/views/taxes/edit.blade.php","undoManager":{"mark":60,"position":60,"stack":[[{"start":{"row":0,"column":0},"end":{"row":79,"column":5},"action":"insert","lines":["@extends('layouts.master')","","@section('content')","","<div class=\"padding\">","    <div class=\"row\">","","        <div class=\"col-md-6\" id=\"managePension\">","            <div class=\"box\">","                <div class=\"box-header\">","                    <h2>Manage PFA</h2><small>Edit/Remove the selected PFA</small></div>","                <div class=\"box-divider m-a-0\"></div>","                <div class=\"box-body\">","                    {!! Form::open(array('url' => '/pension/' . $pension->id . '/edit', 'role' => 'form', 'method'=>'PUT')) !!}","                        <div class=\"form-group\">","                            <label for=\"InputEditPension\">Title</label>","                            <input type=\"text\" value=\"{{$pension->title}}\" name=\"title\" class=\"form-control\" id=\"InputEditPension\" placeholder=\"Enter PFA name, e.g Trust Fund\">","                            <input type=\"hidden\" id=\"InputEditId\" name=\"id\" value=\"{{$pension->id}}\">","                        </div>","                        ","                        <div class=\"form-group row\">","                            <label for=\"InputSalaryComponent\" class=\"col-sm-2 form-control-label\">Salary Component</label>","                            <div class=\"col-sm-10\">","                                <select class=\"form-control c-select\" name=\"salary_component\" id=\"InputSalaryComponent\">","                                    @foreach($salaryComponents as $salaryComponent)","                                    <option value=\"{{$salaryComponent->id}}\" {{$salaryComponent->id == $pension->salary_component_id ? 'selected' : ''}}>{{$salaryComponent->title}}</option>","                                    @endforeach","                                </select>","                            </div>","                        </div>","                        ","                        <button type=\"submit\" class=\"btn black m-b\">SAVE</button>","                        <a href=\"/pension/{{$pension->id}}/delete\" id=\"deletePension\" class=\"m-b\" style=\"text-decoration: underline;\">DELETE</a>","                    {!! Form::close() !!}","                </div>","            </div>","        </div>","        ","        <div class=\"col-md-6\">","            <div class=\"box\">","                <div class=\"box-header\">","                    <h2>PFA List</h2><small>List of PFAs</small></div>","                <div class=\"box-divider m-a-0\"></div>","                <div class=\"box-body\">","                    <div class=\"app-body\">","                        <div class=\"padding\">","                            <table class=\"table b-t b-b\">","                                <thead>","                                    <tr>","                                        <th>Title</th>","                                        <th>Salary Component</th>","                                        <!--<th>Created At</th>-->","                                    </tr>","                                    </thead>","                                <tbody>","                                    @foreach($pensions as $pension)","                                    <tr>","                                        <td><a href=\"/pension/{{$pension->id}}/edit\">{{$pension->title}}</a></td>","                                        <td><a href=\"/pension/{{$pension->id}}/edit\">{{$pension->salary_component->title}}</a></td>","                                        <!--<td>{{$pension->created_at}}</td>-->","                                    </tr>","                                    @endforeach","                                </tbody>","                            </table>","                        </div>","                    </div>","                </div>","            </div>","        </div>","        ","    </div>","</div>","","@stop","","","@section('jsFooter')","","","@stop"],"id":1}],[{"start":{"row":74,"column":0},"end":{"row":79,"column":5},"action":"remove","lines":["","","@section('jsFooter')","","","@stop"],"id":2}],[{"start":{"row":73,"column":5},"end":{"row":74,"column":0},"action":"remove","lines":["",""],"id":3}],[{"start":{"row":7,"column":46},"end":{"row":7,"column":47},"action":"remove","lines":["n"],"id":4}],[{"start":{"row":7,"column":45},"end":{"row":7,"column":46},"action":"remove","lines":["o"],"id":5}],[{"start":{"row":7,"column":44},"end":{"row":7,"column":45},"action":"remove","lines":["i"],"id":6}],[{"start":{"row":7,"column":43},"end":{"row":7,"column":44},"action":"remove","lines":["s"],"id":7}],[{"start":{"row":7,"column":42},"end":{"row":7,"column":43},"action":"remove","lines":["n"],"id":8}],[{"start":{"row":7,"column":41},"end":{"row":7,"column":42},"action":"remove","lines":["e"],"id":9}],[{"start":{"row":7,"column":40},"end":{"row":7,"column":41},"action":"remove","lines":["P"],"id":10}],[{"start":{"row":7,"column":40},"end":{"row":7,"column":41},"action":"insert","lines":["T"],"id":11}],[{"start":{"row":7,"column":41},"end":{"row":7,"column":42},"action":"insert","lines":["a"],"id":12}],[{"start":{"row":7,"column":42},"end":{"row":7,"column":43},"action":"insert","lines":["x"],"id":13}],[{"start":{"row":13,"column":52},"end":{"row":13,"column":59},"action":"remove","lines":["pension"],"id":14},{"start":{"row":13,"column":52},"end":{"row":13,"column":53},"action":"insert","lines":["t"]}],[{"start":{"row":13,"column":53},"end":{"row":13,"column":54},"action":"insert","lines":["a"],"id":15}],[{"start":{"row":13,"column":54},"end":{"row":13,"column":55},"action":"insert","lines":["x"],"id":16}],[{"start":{"row":13,"column":61},"end":{"row":13,"column":68},"action":"remove","lines":["pension"],"id":17},{"start":{"row":13,"column":61},"end":{"row":13,"column":64},"action":"insert","lines":["tax"]},{"start":{"row":16,"column":57},"end":{"row":16,"column":64},"action":"remove","lines":["pension"]},{"start":{"row":16,"column":57},"end":{"row":16,"column":60},"action":"insert","lines":["tax"]},{"start":{"row":17,"column":86},"end":{"row":17,"column":93},"action":"remove","lines":["pension"]},{"start":{"row":17,"column":86},"end":{"row":17,"column":89},"action":"insert","lines":["tax"]},{"start":{"row":25,"column":104},"end":{"row":25,"column":111},"action":"remove","lines":["pension"]},{"start":{"row":25,"column":104},"end":{"row":25,"column":107},"action":"insert","lines":["tax"]},{"start":{"row":32,"column":34},"end":{"row":32,"column":41},"action":"remove","lines":["pension"]},{"start":{"row":32,"column":34},"end":{"row":32,"column":37},"action":"insert","lines":["tax"]},{"start":{"row":32,"column":41},"end":{"row":32,"column":48},"action":"remove","lines":["pension"]},{"start":{"row":32,"column":41},"end":{"row":32,"column":44},"action":"insert","lines":["tax"]},{"start":{"row":55,"column":59},"end":{"row":55,"column":66},"action":"remove","lines":["pension"]},{"start":{"row":55,"column":59},"end":{"row":55,"column":62},"action":"insert","lines":["tax"]},{"start":{"row":57,"column":54},"end":{"row":57,"column":61},"action":"remove","lines":["pension"]},{"start":{"row":57,"column":54},"end":{"row":57,"column":57},"action":"insert","lines":["tax"]},{"start":{"row":57,"column":61},"end":{"row":57,"column":68},"action":"remove","lines":["pension"]},{"start":{"row":57,"column":61},"end":{"row":57,"column":64},"action":"insert","lines":["tax"]},{"start":{"row":57,"column":80},"end":{"row":57,"column":87},"action":"remove","lines":["pension"]},{"start":{"row":57,"column":80},"end":{"row":57,"column":83},"action":"insert","lines":["tax"]},{"start":{"row":58,"column":54},"end":{"row":58,"column":61},"action":"remove","lines":["pension"]},{"start":{"row":58,"column":54},"end":{"row":58,"column":57},"action":"insert","lines":["tax"]},{"start":{"row":58,"column":61},"end":{"row":58,"column":68},"action":"remove","lines":["pension"]},{"start":{"row":58,"column":61},"end":{"row":58,"column":64},"action":"insert","lines":["tax"]},{"start":{"row":58,"column":80},"end":{"row":58,"column":87},"action":"remove","lines":["pension"]},{"start":{"row":58,"column":80},"end":{"row":58,"column":83},"action":"insert","lines":["tax"]},{"start":{"row":59,"column":51},"end":{"row":59,"column":58},"action":"remove","lines":["pension"]},{"start":{"row":59,"column":51},"end":{"row":59,"column":54},"action":"insert","lines":["tax"]}],[{"start":{"row":10,"column":31},"end":{"row":10,"column":34},"action":"remove","lines":["PFA"],"id":18},{"start":{"row":10,"column":31},"end":{"row":10,"column":32},"action":"insert","lines":["T"]}],[{"start":{"row":10,"column":32},"end":{"row":10,"column":33},"action":"insert","lines":["a"],"id":19}],[{"start":{"row":10,"column":33},"end":{"row":10,"column":34},"action":"insert","lines":["x"],"id":20}],[{"start":{"row":15,"column":49},"end":{"row":15,"column":56},"action":"remove","lines":["Pension"],"id":21},{"start":{"row":15,"column":49},"end":{"row":15,"column":52},"action":"insert","lines":["Tax"]},{"start":{"row":16,"column":118},"end":{"row":16,"column":125},"action":"remove","lines":["Pension"]},{"start":{"row":16,"column":118},"end":{"row":16,"column":121},"action":"insert","lines":["Tax"]},{"start":{"row":32,"column":69},"end":{"row":32,"column":76},"action":"remove","lines":["Pension"]},{"start":{"row":32,"column":69},"end":{"row":32,"column":72},"action":"insert","lines":["Tax"]}],[{"start":{"row":55,"column":52},"end":{"row":55,"column":53},"action":"remove","lines":["n"],"id":22}],[{"start":{"row":55,"column":51},"end":{"row":55,"column":52},"action":"remove","lines":["o"],"id":23}],[{"start":{"row":55,"column":50},"end":{"row":55,"column":51},"action":"remove","lines":["i"],"id":24}],[{"start":{"row":55,"column":49},"end":{"row":55,"column":50},"action":"remove","lines":["s"],"id":25}],[{"start":{"row":55,"column":48},"end":{"row":55,"column":49},"action":"remove","lines":["n"],"id":26}],[{"start":{"row":55,"column":47},"end":{"row":55,"column":48},"action":"remove","lines":["e"],"id":27}],[{"start":{"row":55,"column":46},"end":{"row":55,"column":47},"action":"remove","lines":["p"],"id":28}],[{"start":{"row":55,"column":46},"end":{"row":55,"column":47},"action":"insert","lines":["t"],"id":29}],[{"start":{"row":55,"column":47},"end":{"row":55,"column":48},"action":"insert","lines":["a"],"id":30}],[{"start":{"row":55,"column":48},"end":{"row":55,"column":49},"action":"insert","lines":["x"],"id":31}],[{"start":{"row":55,"column":49},"end":{"row":55,"column":50},"action":"insert","lines":["e"],"id":32}],[{"start":{"row":16,"column":136},"end":{"row":16,"column":166},"action":"remove","lines":["Enter PFA name, e.g Trust Fund"],"id":33},{"start":{"row":16,"column":136},"end":{"row":16,"column":137},"action":"insert","lines":["d"]}],[{"start":{"row":16,"column":137},"end":{"row":16,"column":138},"action":"insert","lines":["e"],"id":34}],[{"start":{"row":16,"column":138},"end":{"row":16,"column":139},"action":"insert","lines":["a"],"id":35}],[{"start":{"row":16,"column":139},"end":{"row":16,"column":140},"action":"insert","lines":["f"],"id":36}],[{"start":{"row":16,"column":140},"end":{"row":16,"column":141},"action":"insert","lines":["u"],"id":37}],[{"start":{"row":16,"column":140},"end":{"row":16,"column":141},"action":"remove","lines":["u"],"id":38}],[{"start":{"row":16,"column":139},"end":{"row":16,"column":140},"action":"remove","lines":["f"],"id":39}],[{"start":{"row":16,"column":138},"end":{"row":16,"column":139},"action":"remove","lines":["a"],"id":40}],[{"start":{"row":16,"column":138},"end":{"row":16,"column":139},"action":"insert","lines":["f"],"id":41}],[{"start":{"row":16,"column":139},"end":{"row":16,"column":140},"action":"insert","lines":["a"],"id":42}],[{"start":{"row":16,"column":140},"end":{"row":16,"column":141},"action":"insert","lines":["u"],"id":43}],[{"start":{"row":16,"column":141},"end":{"row":16,"column":142},"action":"insert","lines":["l"],"id":44}],[{"start":{"row":16,"column":142},"end":{"row":16,"column":143},"action":"insert","lines":["t"],"id":45}],[{"start":{"row":16,"column":143},"end":{"row":16,"column":144},"action":"insert","lines":[" "],"id":46}],[{"start":{"row":16,"column":144},"end":{"row":16,"column":145},"action":"insert","lines":["i"],"id":47}],[{"start":{"row":16,"column":145},"end":{"row":16,"column":146},"action":"insert","lines":["s"],"id":48}],[{"start":{"row":16,"column":146},"end":{"row":16,"column":147},"action":"insert","lines":[" "],"id":49}],[{"start":{"row":16,"column":147},"end":{"row":16,"column":148},"action":"insert","lines":["t"],"id":50}],[{"start":{"row":16,"column":148},"end":{"row":16,"column":149},"action":"insert","lines":["a"],"id":51}],[{"start":{"row":16,"column":149},"end":{"row":16,"column":150},"action":"insert","lines":["x"],"id":52}],[{"start":{"row":32,"column":24},"end":{"row":32,"column":25},"action":"insert","lines":["<"],"id":53}],[{"start":{"row":32,"column":25},"end":{"row":32,"column":26},"action":"insert","lines":["!"],"id":54}],[{"start":{"row":32,"column":26},"end":{"row":32,"column":27},"action":"insert","lines":["-"],"id":55}],[{"start":{"row":32,"column":27},"end":{"row":32,"column":28},"action":"insert","lines":["-"],"id":56}],[{"start":{"row":32,"column":136},"end":{"row":32,"column":137},"action":"insert","lines":["-"],"id":57}],[{"start":{"row":32,"column":137},"end":{"row":32,"column":138},"action":"insert","lines":["-"],"id":58}],[{"start":{"row":32,"column":138},"end":{"row":32,"column":139},"action":"insert","lines":[">"],"id":59}],[{"start":{"row":10,"column":51},"end":{"row":10,"column":57},"action":"remove","lines":["Remove"],"id":60}],[{"start":{"row":10,"column":50},"end":{"row":10,"column":51},"action":"remove","lines":["/"],"id":61}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":10,"column":50},"end":{"row":10,"column":50},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1484482116630,"hash":"1cf68a2bc1d15e6fbaa2eb1837ea23d9273b7524"}