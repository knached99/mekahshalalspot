  @props(['content'])

  <section class="about_section layout_padding">
      <div class="container  ">

          <div class="row">
              <div class="col-md-6 ">
                  <div class="img-box">
                      <img src="images/about-img.png" alt="">
                  </div>
              </div>
              @if (isset($content))
                  <div class="col-md-6">
                      <div class="detail-box">
                          <div class="heading_container">
                              <h2
                                  style="font-weight: 900; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
                                  {!! $content ? $content[0]->section_title : '' !!}
                              </h2>
                          </div>
                          <p>
                              {!! $content ? $content[0]->section_content : '' !!}

                          </p>
                          <!-- <a href="">
              Read More
            </a> -->
                      </div>
              @endif
          </div>
      </div>
      </div>
  </section>
