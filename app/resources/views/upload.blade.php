@extends('layout.app')


@section('title','Laravel Axios Multipul File Uploader')
@section('content')



<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 mt-5">
            <div class="card text-center">
                <div class="card-header">
                    <h5>Laravel Ajax File Upload</h5>
                </div>
                <div class="card-body p-3">
                    <input id="FileId" class="form-control my-3" type="file">
                    <button onclick="btn()" id="uploadbtnId" class="btn my-3 btn-block btn-primary">upload</button>
                    <h4 id="Uploadedpercentageid"></h4>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 mt-5 card text-center p-3 m-4">
<table class="table table-bordered">
    <thead class="thead-dark">
    <tr>
    <td>Id No</td>
    <td>Download</td>
    </tr>
    </thead>
    <tbody class="tableData">

    </tbody>
</table>


        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript" >
   getFileList();
    function getFileList(){
        axios.get('/fileList').then(function (response) {
            var JSONDATA=  response.data;


            $.each(JSONDATA,function (i) {
                $('<tr>').html(
                    "<td>"+JSONDATA[i].id+"</td> " +
                    "<td><a href='/filedownload/"+JSONDATA[i]. filepath+"'class='btn  btn-primary'   >Download</button></td>"

                ).appendTo('.tableData');

            })
        }).catch(function (error) {
        })




    }
    function btn(){
        let myfile=document.getElementById('FileId').files[0];
        let myfilneName=myfile.name;
        let myFileSize=myfile.size;
        let fromData=new FormData();
        fromData.append('Filekey',myfile);
        let config={headers:{'Content-Type': 'multipart/form-data'},
        onUploadProgress:function (progressevent){
     let uploadpercentege=Math.round(((progressevent.loaded*100)/progressevent.total));
     let uploadedmb=(progressevent.loaded)/(1028*1028);
     let totalmb=(progressevent.total)/(1028*1028);
            let DueMb=totalmb-uploadedmb;
     $('#Uploadedpercentageid').html("Uploaded :"+uploadedmb.toFixed(2)+"Due :"+DueMb.toFixed(2)+"Total :"+totalmb.toFixed(2));

        }}
        let url='/fileup';
        axios.post(url,fromData,config).then(
            function (response){
                 if(response.status==200){
                     $('#uploadbtnId').html('Upload Success');
                 }else{
                     $('#uploadbtnId').html('Upload Fail');
                 }
            }).catch(
                function (error){
                    $('#uploadbtnId').html('Upload Fail');
                })

      //  alert(myfile);
    }

</script>




@endsection


{{--@section('script')

    <script type="text/javascript">
        function onUpload(){
            let myfile=document.getElementById('FileId').files[0];
            let myfilneName=myfile.name;
            let myFileSize=myfile.size;
            let Filedata=new FormData;
            Filedata.append('Filekey',myfile);
            let config={headers:{'Content-Type': 'multipart/form-data'}}
            let url='/fileup';
            axios.post(url,Filedata,config).then(function (response){

            }).catch(function (error){

            })
            alert(myfile);
        }
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </script>

@endsection--}}
