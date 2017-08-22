<div class="panel-body">
    <form class="form-horizontal">
        <div class="form-group">
            <label for="input-Default" class="col-sm-2 control-label">Default</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="input-Default">
            </div>
        </div>
        <div class="form-group">
            <label for="input-help-block" class="col-sm-2 control-label">Help Block</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="input-help-block">
                <p class="help-block">Example block-level help text here.</p>
            </div>
        </div>
        <div class="form-group">
            <label for="input-placeholder" class="col-sm-2 control-label">Placeholder</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="input-placeholder" placeholder="placeholder">
            </div>
        </div> 
        <div class="form-group">
            <label for="input-rounded" class="col-sm-2 control-label">Rounded Input</label>
            <div class="col-sm-10">
                <input type="text" class="form-control input-rounded" id="input-rounded">
            </div>
        </div>
        <div class="form-group">
            <label for="input-disabled" class="col-sm-2 control-label">Disabled Input</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="input-disabled" placeholder="You can't type here..." disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="input-readonly" class="col-sm-2 control-label">ReadOnly Input</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="input-readonly" placeholder="This is readonly input..." readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Static Control</label>
            <div class="col-sm-10">
                <p class="form-control-static">email@example.com</p>
            </div>
        </div>
        <div class="form-group">
            <label for="input-password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="input-password" placeholder="Password">
            </div>
        </div>
        <div class="form-group has-success">
            <label for="input-success" class="col-sm-2 control-label">Input with success</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="input-success">
            </div>
        </div>
        <div class="form-group has-warning">
            <label for="input-warning" class="col-sm-2 control-label">Input with warning</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="input-warning">
            </div>
        </div>
        <div class="form-group has-error">
            <label for="input-error" class="col-sm-2 control-label">Input with error</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="input-error">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Checkboxes</label>
            <div class="col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox">Unchecked
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" checked>Checked
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" checked disabled>Checked &amp; Disabled
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" disabled>Disabled
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Select</label>
            <div class="col-sm-10">
                <select class="form-control m-b-sm">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <select multiple class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Control sizing</label>
            <div class="col-sm-10">
                <input class="form-control input-lg m-b-sm" type="text" placeholder=".input-lg">
                <input class="form-control m-b-sm" type="text" placeholder="Default input">
                <input class="form-control input-sm" type="text" placeholder=".input-sm">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Column sizing</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-md-2">
                        <input type="text" class="form-control" placeholder=".col-md-2">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" placeholder=".col-md-3">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder=".col-md-4">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Input groups</label>
            <div class="col-sm-10">
                <div class="input-group m-b-sm">
                    <span class="input-group-addon" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group m-b-sm">
                    <input type="text" class="form-control" aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon2">.00</span>
                </div>
                <div class="input-group m-b-sm">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-addon">.00</span>
                </div>
                <div class="input-group m-b-sm">
                    <span class="input-group-addon">
                        <input type="checkbox" aria-label="...">
                    </span>
                    <input type="text" class="form-control" aria-label="...">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Button addons</label>
            <div class="col-sm-10">
                <div class="input-group m-b-sm">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    <input type="text" class="form-control">
                </div>
                <div class="input-group m-b-sm">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
                <div class="input-group m-b-sm">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                    <input type="text" class="form-control" aria-label="...">
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" aria-label="...">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Date Picker</label>
            <div class="col-sm-10">
                <input type="text" class="form-control date-picker">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Time Picker</label>
            <div class="col-sm-10">
                <div class="input-group input-append bootstrap-timepicker">
                    <input id="timepicker1" type="text" class="form-control">
                    <span class="input-group-addon add-on"><i class="fa fa-clock-o"></i></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Color Picker</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="cp1" value="#d43e3e">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">RGBA</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="cp2" value="rgba(68,89,204,1)" data-color-format="rgba">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Tags Input</label>
            <div class="col-sm-10">
                <input type="text" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Wysiwyg</label>
            <div class="col-sm-10">
                <div class="summernote"></div>
            </div>
        </div>
    </form>
</div>