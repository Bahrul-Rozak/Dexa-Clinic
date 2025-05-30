@section('title', 'master data message')

@extends('admin.master');

@section('content')

  <div class="container-fluid" style="height: 90vh; padding: 10px;">
    <div class="row" style="height: 100%; box-shadow: 0 4px 15px rgb(0 0 0 / 0.1); border-radius: 12px; background: white;">
      
      <!-- User List -->
      <div class="col-md-4" style="height: 100%; border-right: 1px solid #ddd; overflow-y: auto; padding: 0;">
        <div style="padding: 15px; border-bottom: 1px solid #ddd; font-weight: 600; font-size: 1.25rem; background: #fff;">
          User List
        </div>
        <ul class="list-group list-group-flush" style="border-radius: 0 0 12px 0;">
          <li class="list-group-item list-group-item-action" style="cursor: pointer; border: none; padding: 15px 20px; transition: background-color 0.3s;" 
              onmouseover="this.style.backgroundColor='#f1f1f1';" onmouseout="this.style.backgroundColor='transparent';">
            <img src="https://i.pravatar.cc/30?img=1" alt="avatar" style="border-radius: 50%; margin-right: 12px;" />
            Budi
          </li>
          <li class="list-group-item list-group-item-action" style="cursor: pointer; border: none; padding: 15px 20px; transition: background-color 0.3s;" 
              onmouseover="this.style.backgroundColor='#f1f1f1';" onmouseout="this.style.backgroundColor='transparent';">
            <img src="https://i.pravatar.cc/30?img=2" alt="avatar" style="border-radius: 50%; margin-right: 12px;" />
            Bahrul Rozak
          </li>
        </ul>
      </div>

      <!-- Chat Area -->
      <div class="col-md-8" style="height: 90%; display: flex; flex-direction: column;">

        <div style="padding: 15px; border-bottom: 1px solid #ddd; font-weight: 600; font-size: 1.25rem; background: #fff;">
          Chat with <span style="color: #0d6efd;">Budi</span>
        </div>

        <div style="flex-grow: 1; padding: 20px; background: #e9ecef; overflow-y: auto; border-radius: 0 0 0 12px;">

          <div style="margin-bottom: 15px; max-width: 60%; background: white; padding: 12px 18px; border-radius: 15px; box-shadow: 0 1px 3px rgb(0 0 0 / 0.1);">
            <strong>Budi</strong> Halo, saya ingin tanya dong?
          </div>

          <div style="margin-bottom: 15px; max-width: 60%; margin-left: auto; background: #0d6efd; color: white; padding: 12px 18px; border-radius: 15px; box-shadow: 0 1px 3px rgb(0 0 0 / 0.1);">
            <strong>You:</strong> Silahkan kak
          </div>

          <!-- Bisa ditambah pesan chat lain -->

        </div>

        <div style="padding: 15px; border-top: 1px solid #ddd; background: white; border-radius: 0 0 12px 0;">
          <form class="d-flex" onsubmit="event.preventDefault(); alert('Pesan terkirim!');">
            <input type="text" class="form-control me-2" placeholder="Write Message..." style="border-radius: 20px;" />
            <button class="btn btn-primary" type="submit" style="border-radius: 20px 20px 20px 20px; padding: 0 20px;">Send</button>
          </form>
        </div>

      </div>

    </div>
  </div>

@endsection