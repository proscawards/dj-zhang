$(document).ready(function() {
    getState();
});

function getState(){
    fetch('https://dj-zhang-backend.herokuapp.com/info', {
        method: 'get',
        headers: {
            'Content-Type': 'application/json'
        }
      }).then((res) => res.json()
      ).then((data) => {
        var state = data.state;
        switch (state){
            case "up":
                $("#state").text("🎧 DJ Ah Zhang is now online!");
                $("#stop").removeClass("disabled");
                $("#stop").prop("disabled",false);
                $("#restart").addClass("disabled");
                $("#restart").prop("disabled",true);
                break;
            case "idle":
                $("#state").text("🎧 DJ Ah Zhang is now idling!");
                $("#restart").removeClass("disabled");
                $("#restart").prop("disabled",false);
                $("#stop").addClass("disabled");
                $("#stop").prop("disabled",true);
                break;
            case "starting":
                $("#state").text("🎧 DJ Ah Zhang is now waking up!");
                $("#restart").addClass("disabled");
                $("#restart").prop("disabled",true);
                $("#stop").addClass("disabled");
                $("#stop").prop("disabled",true);
                break;
        }
      }); 
}

function restartDyno(){
    fetch('https://dj-zhang-backend.herokuapp.com/restart', {
        method: 'get',
        headers: {
            'Content-Type': 'application/json'
        }
    }).then((res) => {
        getState();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            html: "Ah Zhang is waking up!"
          })
    });
}

function stopDyno(){
    fetch('https://dj-zhang-backend.herokuapp.com/stop', {
        method: 'get',
        headers: {
            'Content-Type': 'application/json'
        }
    }).then((res) => {
        getState();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            html: "Ah Zhang is going to sleep!"
          })
    });
}

$("#stop").click(function(e){
    e.preventDefault();
    stopDyno();
});

$("#restart").click(function(e){
    e.preventDefault();
    restartDyno();
    setTimeout(function () {
        getState();
    }, 5000);
});

$("#yz").click(function(e){
    e.preventDefault();

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        showConfirmButton: false,
        timer: 1000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        html: `Refreshing...`
      })
})