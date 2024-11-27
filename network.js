let ipadress = document.getElementById('ipadress').value;
let list_ad = document.querySelectorAll(".ins");
list_ad.forEach(
    (div) => {
        div.addEventListener("click", function () {
            let url_str = "";
            var pkg = JSON.stringify({
              ip:ipadress,
              timestamp:new Date().getTime()
            });
            let form = new FormData();
            form.append('json',pkg);
            fetch('view/analysis.php',{
                method:'POST',
                body:form
              })
              .then(response => response.text())
              .then(data => {
                if(data == 'yes'){
                  list_ad.forEach( (ad_div) => ad_div.remove());
                }
              });
        });
    }
);
