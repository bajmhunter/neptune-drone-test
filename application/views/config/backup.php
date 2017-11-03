<div class="col-md-8 col-md-offset-2">
    <h3>Database Backup</h3>
    <div class="row">
        <div class="col-md-12 block wide">
            <span>Create database backup</span>

            <a class="button btn-sm btn-success" id="sqlbackup">Start</a>
        </div>
    </div>
    <table class="table table-striped" id="resultTable">
        <thead>
            <tr>
                <th width="5%"><span class="glyphicons glyphicons-database-lock"></span></th>
                <th width="25%">Date</th>
                <th width="25%">Time</th>
                <th width="15%">Size</th>
                <th width="15%">Download</th>
                <th width="10%">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($database['backups'] == true) { ?>
        <?php foreach ($database['databases'] as $db) { ?>
        <tr class="row_<?php echo $db['postFile']; ?>">
            <td><span class="glyphicons glyphicons-database"></span></td>
            <td><?php echo $db['date']; ?></td>
            <td><?php echo $db['time']; ?></td>
            <td><?php echo $db['size']; ?></td>
            <td align="right">
                <a href="<?php echo site_url() . 'config/downloadfile/' . $db['postFile']; ?>" class="btn btn-default btn-xs">Download</a>
            </td>
            <td align="right">
                <a onclick="deletefile(this)" class="btn btn-danger btn-xs" id="<?php echo $db['postFile']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
        <?php } else { ?>
        <tr>
            <td colspan="6">There are no database backups found on the server.</td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">

function deletefile(elem)
{
    $.ajax({
    cache: false,
    type: "POST",
    url: "<?php echo base_url() . 'config/deletefile/'; ?>" + elem.id,
    dataType: 'json',
    data: '',
    success: function(data) {
        if(data.success===true) {
            toastr.success(data.message);
            var i = elem.parentNode.parentNode.rowIndex;
            document.getElementById("resultTable").deleteRow(i);
        } else if(data.success === false) {
            toastr.error(data.message);
        }
    },
    error: function() {
        toastr.error("Critical error");
        }
    });
}

$("a#sqlbackup").click( function (){
  $.ajax({
    cache: false,
    type: "POST",
    url: "<?php echo base_url() . 'config/sqlbackup/'; ?>",
    dataType: 'json',
    data: '',
    success: function(data) {
        if(data.success===true) {
            toastr.success(data.message);
            add_row(data.file);
        } else if(data.success === false) {
            toastr.error(data.message);
        }
    },
    error: function() {
        toastr.error("Critical error");
        }
    });
});

function add_row(data) {
    var table = document.getElementById('resultTable').getElementsByTagName('tbody')[0]
    var tr = document.createElement("tr");
    tr.setAttribute("class", "row_" + data.postFile);

    //icon
    var td = document.createElement("td");
    var txt = document.createElement("span");
    txt.setAttribute("class", "glyphicons glyphicons-database-lock");
    td.appendChild(txt);
    tr.appendChild(td);


    add_variable(data.date, tr);
    add_variable(data.time, tr);
    add_variable(data.size, tr);

    add_button("Download", "default", "downloadfile/" + data.postFile, tr)
    add_button("Delete", "danger", "deletefile/" + data.postFile, tr)


    table.appendChild(tr);
}


function add_button(name, type, link, tr) {
    var td = document.createElement("td");
    td.setAttribute("align", "right");

    var cell = document.createElement("a");
    cell.setAttribute("href", "<?php echo base_url(); ?>config/" + link);
    cell.setAttribute("class", "btn btn-xs btn-" + type);
    cell.innerHTML = name;

    td.appendChild(cell);
    tr.appendChild(td);
}

function add_variable(name, tr) {
    var td = document.createElement("td");
    var txt = document.createTextNode(name);
    td.appendChild(txt);
    tr.appendChild(td);
}

</script>