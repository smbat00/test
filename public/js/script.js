document.getElementById('status').addEventListener("change", function (){
    let task = document.querySelector('#status');
    let task_id = task.dataset.taskid;
    let task_status = task.value;
    $.ajax({
        url: '/taskstatus',
        type: "GET",
        dataType: "JSON",
        data: {
            task_id: task_id,
            task_status:task_status
        },
        success: function (res) {
            console.log(res)
        }


    })
});
