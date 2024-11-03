@extends('layouts.master')
@section('title')

    الرئيسسية

@endsection
@section('css')



@endsection
@section('title_page')

    المستخدمين
@endsection
@section('title_page2')

قائمة المستخدمين

@endsection
@section('content')

    {{--المحتوى المتغير --}}

    <div class="container-fluid">
        <div class="row">
            <!-- Left Sidebar -->
            <div class="side-menu-fixed">
                <div class="scrollbar side-menu-bg">
                    <ul class="nav navbar-nav side-menu" id="sidebarnav">
                        <!-- menu item Dashboard-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                                <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                            </a>
                            <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="index.html">Dashboard 01</a> </li>
                                <li> <a href="index-02.html">Dashboard 02</a> </li>
                                <li> <a href="index-03.html">Dashboard 03</a> </li>
                                <li> <a href="index-04.html">Dashboard 04</a> </li>
                                <li> <a href="index-05.html">Dashboard 05</a> </li>
                            </ul>
                        </li>
                        <!-- menu title -->
                        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
                        <!-- menu item Elements-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">Elements</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                            </a>
                            <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                <li><a href="accordions.html">Accordions</a></li>
                                <li><a href="alerts.html">Alerts</a></li>
                                <li><a href="button.html">Button</a></li>
                                <li><a href="colorpicker.html">Colorpicker</a></li>
                                <li><a href="dropdown.html">Dropdown</a></li>
                                <li><a href="lists.html">lists</a></li>
                                <li><a href="modal.html">modal</a></li>
                                <li><a href="nav.html">nav</a></li>
                                <li><a href="nicescroll.html">nicescroll</a></li>
                                <li><a href="pricing-table.html">pricing table</a></li>
                                <li><a href="ratings.html">ratings</a></li>
                                <li><a href="date-picker.html">date picker</a></li>
                                <li><a href="tabs.html">tabs</a></li>
                                <li><a href="typography.html">typography</a></li>
                                <li><a href="popover-tooltips.html">Popover tooltips</a></li>
                                <li><a href="progress.html">progress</a></li>
                                <li><a href="switch.html">switch</a></li>
                                <li><a href="sweetalert2.html">sweetalert2</a></li>
                                <li><a href="touchspin.html">touchspin</a></li>
                            </ul>
                        </li>
                        <!-- menu item calendar-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                                <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">calendar</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                            </a>
                            <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="calendar.html">Events Calendar </a> </li>
                                <li> <a href="calendar-list.html">List Calendar</a> </li>
                            </ul>
                        </li>
                        <!-- menu item todo-->
                        <li>
                            <a href="todo-list.html"><i class="ti-menu-alt"></i><span class="right-nav-text">Todo list</span> </a>
                        </li>
                        <!-- menu item chat-->
                        <li>
                            <a href="chat-page.html"><i class="ti-comments"></i><span class="right-nav-text">Chat </span></a>
                        </li>
                        <!-- menu item mailbox-->
                        <li>
                            <a href="mail-box.html"><i class="ti-email"></i><span class="right-nav-text">Mail box</span> <span class="badge badge-pill badge-warning float-right mt-1">HOT</span> </a>
                        </li>
                        <!-- menu item Charts-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                                <div class="pull-left"><i class="ti-pie-chart"></i><span class="right-nav-text">Charts</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                            </a>
                            <ul id="chart" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="chart-js.html">Chart.js</a> </li>
                                <li> <a href="chart-morris.html">Chart morris </a> </li>
                                <li> <a href="chart-sparkline.html">Chart Sparkline</a> </li>
                            </ul>
                        </li>

                        <!-- menu font icon-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                                <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">font icon</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                            </a>
                            <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                                <li> <a href="themify-icons.html">Themify icons</a> </li>
                                <li> <a href="weather-icon.html">Weather icons</a> </li>
                            </ul>
                        </li>
                        <!-- menu title -->
                        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Widgets, Forms & Tables </li>
                        <!-- menu item Widgets-->
                        <li>
                            <a href="widgets.html"><i class="ti-blackboard"></i><span class="right-nav-text">Widgets</span> <span class="badge badge-pill badge-danger float-right mt-1">59</span> </a>
                        </li>
                        <!-- menu item Form-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                                <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Form & Editor</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                            </a>
                            <ul id="Form" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="editor.html">Editor</a> </li>
                                <li> <a href="editor-markdown.html">Editor Markdown</a> </li>
                                <li> <a href="form-input.html">Form input</a> </li>
                                <li> <a href="form-validation-jquery.html">form validation jquery</a> </li>
                                <li> <a href="form-wizard.html">form wizard</a> </li>
                                <li> <a href="form-repeater.html">form repeater</a> </li>
                                <li> <a href="input-group.html">input group</a> </li>
                                <li> <a href="toastr.html">toastr</a> </li>
                            </ul>
                        </li>
                        <!-- menu item table -->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                                <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">data table</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                            </a>
                            <ul id="table" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="data-html-table.html">Data html table</a> </li>
                                <li> <a href="data-local.html">Data local</a> </li>
                                <li> <a href="data-table.html">Data Table</a> </li>
                            </ul>
                        </li>
                        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">More Pages</li>
                        <!-- menu item Custom pages-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                                <div class="pull-left"><i class="ti-file"></i><span class="right-nav-text">Custom pages</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                            </a>
                            <ul id="custom-page" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="projects.html">projects</a> </li>
                                <li> <a href="project-summary.html">Projects summary</a> </li>
                                <li> <a href="profile.html">profile</a> </li>
                                <li> <a href="app-contacts.html">App contacts</a> </li>
                                <li> <a href="contacts.html">Contacts</a> </li>
                                <li> <a href="file-manager.html">file manager</a> </li>
                                <li> <a href="invoice.html">Invoice</a> </li>
                                <li> <a href="blank.html">Blank page</a> </li>
                                <li> <a href="layout-container.html">layout container</a> </li>
                                <li> <a href="error.html">Error</a> </li>
                                <li> <a href="faqs.html">faqs</a> </li>
                            </ul>
                        </li>
                        <!-- menu item Authentication-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                                <div class="pull-left"><i class="ti-id-badge"></i><span class="right-nav-text">Authentication</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                            </a>
                            <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="login.html">login</a> </li>
                                <li> <a href="register.html">register</a> </li>
                                <li> <a href="lockscreen.html">Lock screen</a> </li>
                            </ul>
                        </li>
                        <!-- menu item maps-->
                        <li>
                            <a href="maps.html"><i class="ti-location-pin"></i><span class="right-nav-text">maps</span> <span class="badge badge-pill badge-success float-right mt-1">06</span></a>
                        </li>
                        <!-- menu item timeline-->
                        <li>
                            <a href="timeline.html"><i class="ti-panel"></i><span class="right-nav-text">timeline</span> </a>
                        </li>
                        <!-- menu item Multi level-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level"><div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">Multi level Menu</span></div><div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                            <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth">Level item 1<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                    <ul id="auth" class="collapse">
                                        <li>
                                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#login">Level item 1.1<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                            <ul id="login" class="collapse">
                                                <li>
                                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#invoice">level item 1.1.1<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                                    <ul id="invoice" class="collapse">
                                                        <li> <a href="#">level item 1.1.1.1</a> </li>
                                                        <li> <a href="#">level item 1.1.1.2</a> </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li> <a href="#">level item 1.2</a> </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#error">level item 2<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                    <ul id="error" class="collapse" >
                                        <li> <a href="#">level item 2.1</a> </li>
                                        <li> <a href="#">level item 2.2</a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- Left Sidebar End-->

            <!--=================================
             Main content -->

            <!--=================================
           wrapper -->

            <div class="content-wrapper">
                <div class="page-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="mb-0"> Data Table </h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                                <li class="breadcrumb-item active">Data Table </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- main body -->
                <div class="row">
                    <div class="col-xl-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h5 class="card-title border-0 pb-0">Webmin default</h5>
                                <div class="table-responsive">
                                    <table class="table table-1 table-bordered table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th>Title 1 </th>
                                            <th>Title 2</th>
                                            <th>Title 3</th>
                                            <th>Title 4</th>
                                            <th>Title 5</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                        </tr>
                                        <tr>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                        </tr>
                                        <tr>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                        </tr>
                                        <tr>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h5 class="card-title border-0 pb-0">Webmin Table border</h5>
                                <div class="table-responsive">
                                    <table class="mb-0 table table-bordered table-2 text-center">
                                        <thead>
                                        <tr>
                                            <th>Title 1 </th>
                                            <th>Title 2</th>
                                            <th>Title 3</th>
                                            <th>Title 4</th>
                                            <th>Title 5</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                        </tr>
                                        <tr>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                        </tr>
                                        <tr>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                        </tr>
                                        <tr>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h5 class="card-title border-0 pb-0">Webmin  Table striped</h5>
                                <div class="table-responsive">
                                    <table class="mb-0 table table-bordered table-3 text-center table-striped">
                                        <thead>
                                        <tr>
                                            <th>Title 1 </th>
                                            <th>Title 2</th>
                                            <th>Title 3</th>
                                            <th>Title 4</th>
                                            <th>Title 5</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                        </tr>
                                        <tr>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                        </tr>
                                        <tr>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                        </tr>
                                        <tr>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                            <td>Column content</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h5 class="card-title border-0 pb-0">Table simple</h5>
                                <div class="table-responsive">
                                    <table class="mb-0 table">
                                        <thead>
                                        <tr>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Email</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>John</td>
                                            <td>Doe</td>
                                            <td>john@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>Mary</td>
                                            <td>Moe</td>
                                            <td>mary@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>July</td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h5 class="card-title border-0 pb-0">Table bordered</h5>
                                <div class="table-responsive">
                                    <table class="mb-0 table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Email</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>John</td>
                                            <td>Doe</td>
                                            <td>john@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>Mary</td>
                                            <td>Moe</td>
                                            <td>mary@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>July</td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h5 class="card-title border-0 pb-0">Table hover</h5>
                                <div class="table-responsive">
                                    <table class="mb-0 table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Email</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Default</td>
                                            <td>Defaultson</td>
                                            <td>def@somemail.com</td>
                                        </tr>
                                        <tr class="success">
                                            <td>Success</td>
                                            <td>Doe</td>
                                            <td>john@example.com</td>
                                        </tr>
                                        <tr class="danger">
                                            <td>Danger</td>
                                            <td>Moe</td>
                                            <td>mary@example.com</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h5 class="card-title border-0 pb-0">Table dark</h5>
                                <div class="table-responsive">
                                    <table class="mb-0 table table-dark">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><div class="col-xl-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h5 class="card-title border-0 pb-0">Table dark striped</h5>
                                <div class="table-responsive">
                                    <table class="mb-0 table table-striped table-dark">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h5 class="card-title border-0 pb-0">Table dark hover</h5>
                                <div class="table-responsive">
                                    <table class="mb-0 table table-hover table-dark">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h5 class="card-title border-0 pb-0">Table dark small </h5>
                                <div class="table-responsive">
                                    <table class="mb-0 table table-sm table-dark">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h5 class="card-title border-0 pb-0">Table Contextual</h5>
                                <div class="table-responsive">
                                    <table class="mb-0 table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Class</th>
                                            <th scope="col">Heading</th>
                                            <th scope="col">Heading</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="table-active">
                                            <th scope="row">Active</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Default</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>


                                        <tr class="table-primary">
                                            <th scope="row">Primary</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="table-secondary">
                                            <th scope="row">Secondary</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="table-success">
                                            <th scope="row">Success</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="table-danger">
                                            <th scope="row">Danger</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="table-warning">
                                            <th scope="row">Warning</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="table-info">
                                            <th scope="row">Info</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="table-light">
                                            <th scope="row">Light</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="table-dark">
                                            <th scope="row">Dark</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h5 class="card-title border-0 pb-0">Table Contextual dark</h5>
                                <div class="table-responsive">
                                    <table class="mb-0 table table-dark">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Heading</th>
                                            <th scope="col">Heading</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="bg-primary">
                                            <th scope="row">1</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="bg-success">
                                            <th scope="row">3</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="bg-info">
                                            <th scope="row">5</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="bg-warning">
                                            <th scope="row">7</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">8</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        <tr class="bg-danger">
                                            <th scope="row">9</th>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--=================================
                wrapper -->

                <!--=================================
                 footer -->

                <footer class="p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-center text-md-left">
                                <p class="mb-0"> &copy; Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>. <a href="#"> Webmin </a> All Rights Reserved. </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <ul class="text-center text-md-right">
                                <li class="list-inline-item"><a href="#">Terms & Conditions </a> </li>
                                <li class="list-inline-item"><a href="#">API Use Policy </a> </li>
                                <li class="list-inline-item"><a href="#">Privacy Policy </a> </li>
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    لوحة التحكم


@endsection

