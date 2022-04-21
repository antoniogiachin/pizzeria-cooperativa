<template>
  
  <footer class="container-fluid bg-dark text-center text-white">

    <div class="d-flex justify-content-center">
        <div class="container row py-4">

        <div class="col">
          <a class="btn btn-outline-light btn-floating" href="#"><i class="fab fa-facebook-f"></i></a>
        </div>
        
        <div class="col">
          <a class="btn btn-outline-light btn-floating" href="#"><i class="fab fa-twitter"></i></a>
        </div>

        <div class="col">
          <a class="btn btn-outline-light btn-floating" href="#"><i class="fab fa-google"></i></a>
        </div>

        <div class="col">
          <a class="btn btn-outline-light btn-floating" href="#"><i class="fab fa-instagram"></i></a>
        </div>

        <div class="col">
          <a class="btn btn-outline-light btn-floating" href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
      
      </div>
    </div>



    
    <div class="row justify-content-center">
        <div class="col-6">

          <!-- form finto -->
          <form action="" method="" class="d-flex align-items-center my-4">

              <strong class="mx-3">Iscriviti alla nostra newsletter</strong>
              <input type="email" class="form-control mx-3" placeholder="Inserisci la tua email...">
              <button type="submit" class="btn btn-outline-light mx-3">Iscriviti</button>

          </form>

        </div>
    </div>



      
    
    <p class="mb-4">
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. At porro beatae architecto blanditiis. Similique a aliquam, vero placeat illum eos praesentium dolorem, tempora atque dignissimos esse repudiandae quam ipsum perspiciatis.
      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos, a perferendis fugit, possimus necessitatibus aperiam repudiandae praesentium cum, explicabo quo mollitia saepe. Tempore, pariatur? Odit recusandae atque magnam in ea.
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa similique ipsam quos? Animi consequatur repellendus id obcaecati modi hic dolorum, tenetur, rem, distinctio deserunt odio porro sapiente ducimus quisquam voluptas?
    </p>

     

    
    <div class="row my-4">
      
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0" v-for="i in 4" :key="'links' + i">
        <h5 class="text-uppercase">Links</h5>

        <ul class="list-unstyled mb-0">
          <li v-for="j in 4" :key="'link' + j">
            <a href="#" class="text-white">Link {{j}}</a>
          </li>
        </ul>

      </div>
      

    </div>

       <div class="row">
         <div class="col p-0">
            <div class="text-center py-3 ms_backgroundColorCopyright">&copy; 2020 Copyright: tutti i diritti sono riservati</div>
         </div>
       </div>


  </footer>

</template>

<script>
  export default {
      name: 'Footer',
  }
</script>

<style scoped>

  .ms_backgroundColorCopyright{
    background-color: rgba(0, 0, 0, 0.2);

  }

</style>
