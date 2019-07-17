<section id="history" class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h2>HISTORIQUE</h2>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
      </div>
    </div>
  </div>
</section>

<section id="about">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2>A PROPOS</h2>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, 
                qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.
              </p>
              <ul>
                <li>Clickable nav links that smooth scroll to page sections</li>
                <li>Responsive behavior when clicking nav links perfect for a one page website</li>
                <li>Bootstrap scrollspy feature which highlights which section of the page you are on in the navbar</li>
                <li>Minimal custom CSS so you are free to explore your own unique design options</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    
      <section id="services" class="bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2>SERVICES</h2>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
            </div>
          </div>
        </div>
      </section>
    
      <section id="contact">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h2>CONTACTEZ-NOUS</h2>
              <p class="lead text-center">FORMULAIRE DE CONTACT</p>
            
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                  <div class="col">
                      <label for="name">Nom:</label>
                      <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Votre nom">

                      @if ($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>
                  <div class="col">
                      <label for="email">Adreese e-mail:</label>
                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Votre e-mail">

                      @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
                   <div class="col-md-12">
                    <label for="message">Message:</label>                    
                    <textarea class="form-control {{ $errors->has('message') ? ' is-invalid' : '' }}" rows="5" name="message" value="{{ old('message') }}" placeholder="Votre message"></textarea>
                    @if ($errors->has('message'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <br/>
                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>
                  {{ __('Envoyer') }}
              </button>
              </form>
            </div>
            <div class="col-lg-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.7112822816866!2d-17.474152885194485!3d14.728908389720893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xec172f06847d26b%3A0x460c4de8938b95a1!2sI3T+Institut+des+Ing%C3%A9nieurs+en+Informatique+et+T%C3%A9l%C3%A9communications!5e0!3m2!1sfr!2ssn!4v1563373600707!5m2!1sfr!2ssn" width="600" height="450" frameborder="0" style="border:0" allowfullscreen>  
            </iframe>
          </div>
        </div>
        </div>
      </section>