function start(){
    getAll();
    
}
 
//ajax

function deleteSp(){
    el=document.getElementById('xoa_sp');
    $id_sp=el.getAttribute('value');
    xml = new XMLHttpRequest();
    {
        xml.onreadystatechange = function() {
            if (xml.readyState == 4){
                
                check=xml.responseText;
                if(check==1){
                    
                    
                    cancelXoa();
                    alertMessages(false,"Bạn đã xóa thành công!","Xóa");
                    
                    getAll();
                    
                }else{
                    alert("Lỗi!Thử lại sau.");
                }      
                // el = document.querySelector('tbody');
                // el.innerHTML=xml.responseText;          

            }
            
                
        }   
        url = './ajax/xuly_ajax.php?act=deleteSp&id_sp='+$id_sp;      
        xml.open("GET", url, "false");
        xml.send();
    }
}


function save($id_sp){
    

    el=document.querySelector('tr[data-id="'+$id_sp+'"]');
    input=el.querySelectorAll('td')
    
    checkIsEmpty(input);
    
    if(!checkIsEmpty(input)){
        alertMessages(false,"Vui lòng nhập đầy đủ thông tin","Lỗi!");
        return;
    }
    var sp={
        id_sp:$id_sp,
        ten:input[0].childNodes[0].value,
        id_loai:input[1].childNodes[0].value,
        ngay_sx:input[2].childNodes[0].value,
        ngay_het_han:input[3].childNodes[0].value,
        so_luong:input[4].childNodes[0].value,
        gia:input[5].childNodes[0].value
    };
    xml = new XMLHttpRequest();
    {
        xml.onreadystatechange = function() {
            if (xml.readyState == 4){
                el = document.querySelector('tbody');
                check=xml.responseText;
                
                if(check==1){
                    
                    alertMessages(true,"Sửa thông tin sản phẩm thành công","Sửa");
                    getAll();
                }else{
                    alert("Lỗi!Thử lại sau.");
                }      
                // el = document.querySelector('tbody');
                // el.innerHTML=xml.responseText;          

            }
                
        }   
        url = './ajax/xuly_ajax.php?act=updateSp&sp='+JSON.stringify(sp);      
        xml.open("GET", url, "false");
        xml.send();
    }
    
    
}






function getAll(){
    let trang=document.getElementById("data-trang").value;
    let timKiem=document.getElementById("timkiem").value;
    let boloc=document.getElementById("data-filter").value;
    if(timKiem){
        timKiem="&timkiem="+timKiem;
    }
    if(trang){
        trang="&trang="+trang;
    }
    
    if(boloc=="Tất cả"){
        boloc="";
    }else{
        boloc="&boloc="+boloc;
    }
    
    xml = new XMLHttpRequest();
    {
        xml.onreadystatechange = function() {
            if (xml.readyState == 4){
                el = document.querySelector('tbody');
                el.innerHTML=xml.responseText;
                               
            }
                
        }   
        url = './ajax/xuly_ajax.php?act=getAll'+timKiem+boloc+trang;      
        xml.open("GET", url, "false");
        xml.send();
    }
}

function addSubmit($data_id){
   
    el=document.querySelector('tr[data-id="'+$data_id+'"]');
    input=el.childNodes;
    checkIsEmpty(input);
    
    if(!checkIsEmpty(input)){
        alertMessages(false,"Vui lòng nhập đầy đủ thông tin","Lỗi!");
        return;
    }

    var sp={
        ten:input[0].childNodes[0].value,
        id_loai:input[1].childNodes[0].value,
        ngay_sx:input[2].childNodes[0].value,
        ngay_het_han:input[3].childNodes[0].value,
        so_luong:input[4].childNodes[0].value,
        gia:input[5].childNodes[0].value
    };
    xml = new XMLHttpRequest();
    {
        xml.onreadystatechange = function() {
            if (xml.readyState == 4){
                el = document.querySelector('tbody');
                check=xml.responseText;
                if(check==1){
                    getAll();
                    alertMessages(true,"Thêm sản phẩm thành công","Thêm");
                }else{
                    alert("sai");
                }              

            }
                
        }   
        url = './ajax/xuly_ajax.php?act=addSp&sp='+JSON.stringify(sp);      
        xml.open("GET", url, "false");
        
        xml.send();
    }
    

}

function addLoai(){
    
    data=document.getElementById("data-add-loai").value;
    
    if(!data){
        alert("Nhập đầy đủ");
        return;
    }
    xml = new XMLHttpRequest();
    {
        xml.onreadystatechange = function() {
            if (xml.readyState == 4){
                
                
                check=xml.responseText;
                
                cancelAddLoai();
                if(check){
                    
                    el=document.getElementById('data-filter');
                    el.innerHTML='<option value="" selected="true">Tất cả</option>'+ xml.responseText;
               
                    alertMessages(true,"Thêm loại thành công","Thêm");
                    
                }else{
                    alert("Lỗi!Thử lại sau.");
                }      
                
                         

            }
                
        }   
        url = './ajax/xuly_ajax.php?act=addLoai&ten_loai='+data;      
        xml.open("GET", url, "false");
        xml.send();
    }   
}

//end ajax


function addTrang($timKiem,$boloc){
    if($timKiem){
        timKiem="&timkiem="+timKiem;
    }

    if($boloc=="Tất cả"){
        $boloc="";
    }else{
        $boloc="&boloc="+$boloc;
    }
    xml = new XMLHttpRequest();
    {
        xml.onreadystatechange = function() {
            if (xml.readyState == 4){
                el = document.getElementById('data-trang');
                el.innerHTML=xml.responseText;                
            }
                
        }   
        url = './ajax/xuly_ajax.php?act=getTrang'+$timKiem+$boloc;      
        xml.open("GET", url, "false");
        xml.send();
    }

}

function createSeletion($text){
    value='';
    if($text){
        value='&value='+$text;
        
    }
    let td =document.createElement('td');
    let select=document.createElement('select');
    xml = new XMLHttpRequest();
    {
        xml.onreadystatechange = function() {
            if (xml.readyState == 4){
                select.innerHTML=xml.responseText;  
                td.appendChild(select);        
            }
                
        }   
        url = './ajax/xuly_ajax.php?act=getLoai'+value;      
        xml.open("GET", url, "false");
        xml.send();
    }
    
    
    
    return td;
}

function alertMessages($status,$message,$type){
    el=document.getElementById('alert');
    el.removeAttribute('class');
    
    if($status){
        el.setAttribute("class", "alert color-success block");
       
        
    }else{
        
        el.setAttribute("class","alert color-failed block");
        
    }
    el.querySelector('strong').innerHTML=$type+"  ";
    el.querySelector('i').innerHTML=$message;
}

function unAlert(){
    el=document.getElementById('alert');
    el.removeAttribute('class');
    el.classList.add("none");
}

function checkIsEmpty($input){
    len=$input.length-1
    for(let i=0;i<len;i++){
        if(!$input[i].childNodes[0].value){
            
            return false;
        }
        
    }
    return true;
}

function editClick($id_sp){
    
    let el=document.querySelector('[data-id="'+$id_sp+'"]');
    td=el.querySelectorAll('td[data-field]');
    

    td.forEach(element => {
        if(element.getAttribute("data-field")=='type'){
            element.parentNode.replaceChild(createSeletion(element.innerHTML), element);
            
        }else{
        // element.innerHTML='<input type="text" value="'+element.innerHTML+'">'
        element.parentNode.replaceChild(creareTd(element.getAttribute("data-field"),element.innerHTML), element);

        }
    });

    icon=el.getElementsByTagName('i')
    a=el.querySelector('a[title="Edit"]');
    icon[0].classList.remove("fa-pencil-square-o");
    icon[0].classList.add("fa-save");
    a.removeAttribute("onclick");
    a.setAttribute("onclick", "save('"+$id_sp+"')");  
}

function creareTd($type,$data){
    
    let td =document.createElement('td');
    let input=document.createElement('input');
    input.setAttribute('type',$type);
    if($type='number'){
        input.setAttribute('min',1);
    }
    if($data){
        input.value=$data;
    }
    td.appendChild(input);
    
    return td;
}

function creareTdBtn($data_id){
    let td =document.createElement("td");
    let a=`<a class='button button-small' title='Edit' onclick='addSubmit("add-`+$data_id+`")'>
                 <i class='fa fa-check-square fa-1x' aria-hidden='true'></i>
                </a> 
                <a class='button button-small' title='Delete' onclick='addCancel("add-`+$data_id+`")'>
                <i class='fa fa-times' ></i>
              </a>`;
    td.innerHTML=a;
    return td;
}

function addCancel($data_id){
    
    let el=document.querySelector('tbody');
    item=el.querySelector('tr[data-id="'+$data_id+'"]');
    item.remove();
}

function showDiaLogAddLoai(){
    el=document.getElementById("add_loai");
    el.style.display="block";
}
function cancelAddLoai(){
    el=document.getElementById("add_loai");
    el.style.display="none";
}


function alertXoa($id_sp){
    el=document.getElementById('xoa_sp');
    el.setAttribute('value',$id_sp);
    el.style.display='block';
}
function cancelXoa(){
    el=document.getElementById('xoa_sp');
    el.style.display='none';
}
function addSp(){
    let el=document.querySelector('tbody');
    data_id=el.getElementsByTagName('tr').length


    first=el.getElementsByTagName('tr')[0];
    
    let tr=document.createElement('tr');
    tr.appendChild(creareTd('text'));
    tr.appendChild(createSeletion());
    tr.appendChild(creareTd('date'));
    tr.appendChild(creareTd('date'));
    tr.appendChild(creareTd('number'));
    tr.appendChild(creareTd('number'));
    tr.appendChild(creareTdBtn(data_id));
    tr.classList.add('edit');
    tr.setAttribute('data-id','add-'+data_id);
    el.insertBefore(tr,el.firstChild); 
}


