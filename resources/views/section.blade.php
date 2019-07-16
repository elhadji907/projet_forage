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
            <div class="col-lg-8 mx-auto">
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
                    <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" rows="5" name="message" value="{{ old('message') }}" placeholder="Votre message"></textarea>
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
          </div>
        </div>
      </section>