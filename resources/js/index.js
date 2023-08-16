document.addEventListener('DOMContentLoaded', function(){
    let key = document.getElementById('plan_key');
    let name = document.getElementById('plan_name');

    if (key && name) {
      key.addEventListener('change', function(){
        let result = key.selectedOptions[0].innerText;
        name.value = result;
      }, false);
    }

    //console.log('DOM loaded with JavaScript');
}, false);