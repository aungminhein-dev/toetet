//zoom
if($('.zoom-screen .header-nav-list').length>0){
    $('.zoom-screen .header-nav-list').on('click',function(e){if(!document.fullscreenElement){
            document.documentElement.requestFullscreen();
            }else{if(document.exitFullscreen){
                document.exitFullscreen();
            }
        }
    })
}
function copyToClipboard(text) {
    // Create a temporary textarea element to hold the text to be copied
    const textarea = document.createElement('textarea');
    textarea.value = text;

    // Add the textarea element to the DOM
    document.body.appendChild(textarea);

    // Select the text in the textarea and copy it to the clipboard
      textarea.select();
      document.execCommand('copy');

    // Remove the textarea element from the DOM
      document.body.removeChild(textarea)

  }
  let clipboards = document.querySelectorAll('.clipboard');
  clipboards.forEach((clipboard) =>{
    clipboard.addEventListener('click',()=>{
        toastr.success('Copied')
    })
  })


// toastr
toastr.options.closeButton = true;
toastr.options.closeMethod = 'fadeOut';
toastr.options.closeDuration = 300;
toastr.options.closeEasing = 'swing';
toastr.options.progressBar = true;





