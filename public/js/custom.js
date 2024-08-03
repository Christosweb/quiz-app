window.addEventListener('DOMContentLoaded', function()
{

    
    const userSelect = document.querySelectorAll(".userSelect");

    userSelect.forEach(element => {
        element.addEventListener('click', function(event){
            const question_id = event.target.getAttribute('data-question-id');
            const is_correct = event.target.getAttribute('data-is-correct');
    
         userSelect.forEach((item)=>{
            if (item !== element) {
                item.checked = false;
            }
         })
        
         request(event.target.value, question_id, is_correct)
    })
    });

/**
 * update progress bar
 */
   function progressBar()
   {
    const progress = document.getElementById('progress-bar');
   if(!progress) return false ;

   const currentPage = progress.getAttribute('data-current-page');
   const lastPage = progress.getAttribute('data-last-page');

    progress.style.width = (100/lastPage) * (currentPage)  + '%'

   }progressBar()

})


function request(user_option_id, question_id, is_correct) {
    const routeUrl = document.getElementById('myForm');
    const url = routeUrl.getAttribute("action")

    const csrf_token = document.querySelector("meta[name='csrf-token']").getAttribute('content');
    xhr = new XMLHttpRequest();

    xhr.onload = function() {
        console.log(this.responseText)
    }
     
    xhr.open('PUT', url, true);
          xhr.setRequestHeader('Content-Type', 'application\json');

          
          xhr.setRequestHeader('X_CSRF-TOKEN', csrf_token);

          xhr.send(JSON.stringify(data={
            'user_option_id': user_option_id,
            'question_id': question_id,
            'is_correct' : is_correct
          }
        ));
    
}

function quizzSubmission()
{
    const submit_btn = document.getElementById('submit')
    if(!submit_btn) return false ;

    submit_btn.addEventListener('click', function(){
        submitRequest()
    })
}quizzSubmission()


function submitRequest() {
    
    const csrf_token = document.querySelector("meta[name='csrf-token']").getAttribute('content');
    xhr = new XMLHttpRequest();

    xhr.onload = function() {
        // console.log(this.responseText)
        window.location.href = 'final'
    }
     
    xhr.open('GET', 'final', true);
          xhr.setRequestHeader('Content-Type', 'application\json');

          
          xhr.setRequestHeader('X_CSRF-TOKEN', csrf_token);

          xhr.send( );
    
}

