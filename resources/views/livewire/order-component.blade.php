<div>
    <div class="row">    
        <div class="col-md-8">        
          <div class="mt-2 table-responsive-md">            
            <table class="table table-striped">                
              <thead>                  
                <tr>                    
                  <th scope="col">Order Ref</th>                    
                  <th scope="col">Customer Name</th>                                                       
                  <th scope="col"></th>                  
                  </tr>                
              </thead>                
              <tbody>                    
                @foreach ($orders as $order)                        
                  <tr>                            
                    <td>{{ $order->order_ref }}</td>                            
                    <td>{{ $order->customer_name }}</td>                                                     
                    <td>                                
                      <button type="button" class="btn btn-success">Editar</button>                            
                    </td>                            
                    <td>                                
                      <button type="button" class="btn btn-danger">Borrar</button>                            
                    </td>                        
                  </tr>                    
                @endforeach                
              </tbody>            
             </table>                  
           </div>    
         </div>    
         <div class="col-md-4">    
         </div> 
      </div>
</div>
