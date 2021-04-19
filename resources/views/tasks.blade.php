@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')
</div>

<!-- TODO: Current Tasks -->
<div class="panel panel-default">
    <div class="card-hover-shadow-2x mb-3 card">
        <div class="card-header-tab card-header">
            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Task Lists</div>
        </div>
        <div class="scroll-area-sm">
            <perfect-scrollbar class="ps-show-limits">
                <div style="position: static;" class="ps ps--active-y">
                    <div class="ps-content">
                        @if (count($tasks) > 0)
                        <ul class=" list-group list-group-flush">
                            @foreach ($tasks as $task)
                            <li class="list-group-item">
                                <div class="todo-indicator bg-warning"></div>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control"> <input class="custom-control-input" id="exampleCustomCheckbox12" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label> </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">{{ $task->name }}
                                            </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <form action="{{ url('task-delete/'.$task->id) }}" method="POST">
                                                <button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button>
                                                
                                                {!! csrf_field() !!}
                                                {!! method_field('DELETE') !!}
                                                <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </perfect-scrollbar>
        </div>
        <div class="d-block text-right card-footer">
            <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                {!! csrf_field() !!}

                <!-- Task Name -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" placeholder="✍️ Add item..." name="name" id="task-name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <!-- Add Task Button -->
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button class="btn btn-primary float-right">Add Task</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    @endsection