<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="JS/bootstrap.bundle.min.js"></script>
<script src="JS/all.min.js"></script>

<script>
    function alert (type , msg) {
        let bs_class = (type == 'SUCCESS') ? 'alert-success' : 'alert-danger';
        let element = document.createElement('div');
        
        element.innerHTML=`<div class="alert ${bs_class} alert-dismissible fade show custom-alert" role="alert" 
        style="top:80px; position: fixed; z-index-4; right: 18px; width: 25%; font-family: 'Edu VIC WA NT Beginner', cursive;">
        <strong class="me-3"> ${msg} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;

        document.body.append(element);
    }
</script>