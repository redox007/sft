


<div class="pv" id="preview">
    <?php load_medias(1, $input_media_id = '#input-media', true); ?>
</div>
<input id="input-media" type="text" value="1" name="media_ids" />
<!-- Large modal -->
<button type="button" class="btn btn-primary media-button" data-input-field="#input-media"  data-preview="#preview" >Media</button>

<div class="pv" id="preview2">
    <?php load_medias([2, 3], $input_media_id = '#input-media2'); ?>
</div>
<input id="input-media2" type="text" value="2,3" name="media_ids" />
<!-- Large modal -->
<button type="button" class="btn btn-primary media-button" data-input-field="#input-media2" data-is-multi="true" data-preview="#preview2" >Media</button>

<?php media(2); ?>

<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse1">Collapsible panel</a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
            <div class="panel-body">Panel Body</div>
            <div class="panel-footer">Panel Footer</div>
        </div>
    </div>
</div>
Try it Yourself »
Collapsible List Group
Collapsible list group
The following shows a collapsible panel with a list group inside:

Example
<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse1">Collapsible list group</a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
            <ul class="list-group">
                <li class="list-group-item">One</li>
                <li class="list-group-item">Two</li>
                <li class="list-group-item">Three</li>
            </ul>
            <div class="panel-footer">Footer</div>
        </div>
    </div>
</div>
Try it Yourself »
Accordion
Collapsible Group 1
Collapsible Group 2
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
Collapsible Group 3
The following example shows a simple accordion by extending the panel component.

Note: Use the data-parent attribute to make sure that all collapsible elements under the specified parent will be closed when one of the collapsible item is shown.

Example
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                    Collapsible Group 1</a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat.</div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                    Collapsible Group 2</a>
            </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat.</div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                    Collapsible Group 3</a>
            </h4>
        </div>
        <div id="collapse3" class="panel-collapse collapse">
            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat.</div>
        </div>
    </div>
</div>