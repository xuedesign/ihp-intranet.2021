document.getElementById("fruits_container").addEventListener("change",(e)=>{
    if(!e.target.checked){
      document.querySelector("input[type=checkbox][name=select_all]").checked=false;
    }else{
      const checkBoxCount = document.querySelectorAll("input[type=checkbox]:not([name=select_all])").length;
      
      const selectedCheckBoxCount = document.querySelectorAll("input[type=checkbox]:checked:not([name=select_all])").length;
      console.log(selectedCheckBoxCount)
      if(checkBoxCount===selectedCheckBoxCount){
        document.querySelector("input[type=checkbox][name=select_all]").checked=true;
      }
    }
 })
 
 document.querySelector("input[name=select_all]").addEventListener("change",
 (e)=>{
     const allCheckBoxElements = document.querySelectorAll("input[type=checkbox]:not([name=select_all])");
     allCheckBoxElements.forEach(el =>{
       
       if(e.target.checked){
         el.checked = true;
       }else {
         el.checked = false;
       }
     })
 });