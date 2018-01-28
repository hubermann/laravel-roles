@extends('layouts.frontend')

@section('content')


<section>
    <div class="container">



<div class="row g-mb-20">
          <div class="col-md-4 g-mb-30">
          <br>
            <h2 class="mb-5">Garantías</h2>

            <!-- Nav tabs -->
            <ul class="nav flex-column u-nav-v5-3 u-nav-primary g-bg-gray-light-v5 rounded g-pa-20" role="tablist" data-target="nav-5-3-primary-ver" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-primary">
              <li class="nav-item">
                <a class="nav-link g-brd-bottom-none g-color-primary--hover active" data-toggle="tab" href="#nav-5-3-primary-ver--1" role="tab" aria-expanded="false">Presentación del producto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link g-brd-bottom-none g-color-primary--hover " data-toggle="tab" href="#nav-5-3-primary-ver--2" role="tab" aria-expanded="true">Nota de credito</a>
              </li>
              <li class="nav-item">
                <a class="nav-link g-brd-bottom-none g-color-primary--hover" data-toggle="tab" href="#nav-5-3-primary-ver--3" role="tab" aria-expanded="false">Retiro de mercaderia del R.M.A.</a>
              </li>
              <li class="nav-item">
                <a class="nav-link g-brd-bottom-none g-color-primary--hover" data-toggle="tab" href="#nav-5-3-primary-ver--4" role="tab" aria-expanded="false">Plazos de garantia</a>
              </li>

            </ul>
            <!-- End Nav tabs -->
          </div>

          <div class="col-md-8 g-mb-30">

          <br>


            <!-- Tab panes -->
            <div id="nav-5-3-primary-ver" class="tab-content g-pt-20 g-pt-0--md">
              <div class="tab-pane fade active show" id="nav-5-3-primary-ver--1" role="tabpanel" aria-expanded="false"   >
                <h3 class="h5 g-color-gray-dark-v2 g-mb-30">Presentación del producto</h3>

                <!-- Accordion -->
                <div id="accordion-12-1" class="u-accordion u-accordion-color-primary" role="tablist" aria-multiselectable="true">

                  <div class="card g-brd-none">
                    CONDICIONES INDISPENSABLES PARA RECIBIR PRODUCTOS EN GARANTIA <br>
                    NO OMITA NINGUN PUNTO NI DUDE EN CONSULTARNOS VIA EMAIL O TELEFONICAMENTE AL:<br>
                    Mail: soporte@proctecno.com <br>
                    Tel: 1169661866 <br>
                    <br>
                    - Presentarse en la oficina dentro del horario de atención, Lunes a Viernes de 10.00hs a 20:00hs y Sábados 10 a 18:00hs
                    <br>
                  </div>


                  <!-- own card -->
                  <div class="card g-brd-none">
                    <br>
                    <h5 class="g-color-gray-dark-v4">
                      <span class="g-color-primary g-font-weight-700 g-font-size-16 g-line-height-1_2">1.</span>
                      Presentar el producto con el embalaje original
                    </h5>
                    <div class="u-accordion__body g-color-gray-dark-v4">
                      <p>Presentar el producto con embalaje original, manuales, cables, drivers y accesorios. <br> NO SE HARAN EXCEPCIONES DE NINGUN TIPO.</p>
                    </div>
                  </div>
                  <!-- end own card -->



                  <!-- own card -->
                  <div class="card g-brd-none">
                    <h5 class="g-color-gray-dark-v4">
                      <span class="g-color-primary g-font-weight-700 g-font-size-16 g-line-height-1_2">2.</span>
                      Presentar el producto en perfectas condiciones físicas.
                    </h5>
                    <div class="u-accordion__body g-color-gray-dark-v4">
                      <p>Presentar el producto sin daños físico: (golpes marcas roturas, quemaduras, tierra / arena / agua), los cuales anulan la garantía.</p>
                    </div>
                  </div>
                  <!-- end own card -->

                  <!-- own card -->
                  <div class="card g-brd-none">
                    <h5 class="g-color-gray-dark-v4">
                      <span class="g-color-primary g-font-weight-700 g-font-size-16 g-line-height-1_2">3.</span>
                      Presentar el producto dentro del plazo de garantía.
                    </h5>
                    <div class="u-accordion__body g-color-gray-dark-v4">
                      <p>No podrán recibirse artículos de ningún tipo que se encuentren fuera de los plazos de garantía.</p>
                    </div>
                  </div>
                  <!-- end own card -->


                  <!-- own card -->
                  <div class="card g-brd-none">
                    <h5 class="g-color-gray-dark-v4">
                      <span class="g-color-primary g-font-weight-700 g-font-size-16 g-line-height-1_2">4.</span>
                      Diagnóstico del producto.
                    </h5>
                    <div class="u-accordion__body g-color-gray-dark-v4">
                      <p>Todo producto que ingrese en garantía tendrá una demora mínima de 72 hs para su diagnóstico o devolución. La aceptación de las partes en garantía no autoriza ni el recambio ni la validación de la parte en garantía por posibles defectos técnicos no visibles o alteraciones por mal uso.</p>
                    </div>
                  </div>
                  <!-- end own card -->

                  <!-- own card -->
                  <div class="card g-brd-none">
                    <h5 class="g-color-gray-dark-v4">
                      <span class="g-color-primary g-font-weight-700 g-font-size-16 g-line-height-1_2">5.</span>
                      Etiquetas de garantía y/o código de barras.
                    </h5>
                    <div class="u-accordion__body g-color-gray-dark-v4">
                      <p>Los números de serie deben estar legibles. Las etiquetas de garantía o códigos de barra no deben estar corridas, rotas ni levantadas, su condición debe ser similar a la del día de retiro del producto, Cualquier alteración de las mismas anularan la garantía.</p>
                    </div>
                  </div>
                  <!-- end own card -->

                  <!-- own card -->
                  <div class="card g-brd-none">
                    <h5 class="g-color-gray-dark-v4">
                      <span class="g-color-primary g-font-weight-700 g-font-size-16 g-line-height-1_2">6.</span>
                      Anulación de garantía.
                    </h5>
                    <div class="u-accordion__body g-color-gray-dark-v4">
                      <p>Toda raya, golpe, rotura, escritura sobre relieve, marca no original en la superficie, anula la garantía sin posibilidad de revisión de la misma. Sin excepciones.</p>
                    </div>
                  </div>
                  <!-- end own card -->


                </div>
                <!-- End Accordion -->
              </div>

              <div class="tab-pane fade " id="nav-5-3-primary-ver--2" role="tabpanel" aria-expanded="true"   >
                <h3 class="h5 g-color-gray-dark-v2 g-mb-30">Nota de crédito.</h3>

                <!-- Accordion -->
                <div id="accordion-12-2" class="u-accordion u-accordion-color-primary" role="tablist" aria-multiselectable="true">


                  <div class="card g-brd-none">
                    CONDICIONES INDISPENSABLES PARA RECIBIR PRODUCTOS EN GARANTIA <br>
                    NO OMITA NINGUN PUNTO NI DUDE EN CONSULTARNOS VIA EMAIL O TELEFONICAMENTE AL:<br>
                    Mail: soporte@proctecno.com <br>
                    Tel: 1169661866 <br>
                    <br>
                    - Presentarse en la oficina dentro del horario de atención, Lunes a Viernes de 10.00hs a 20:00hs y Sábados 10 a 18:00hs
                    <br>
                  </div>

                  <!-- own card -->
                  <div class="card g-brd-none">
                    <br>
                    <h5 class="g-color-gray-dark-v4">
                      <span class="g-color-primary g-font-weight-700 g-font-size-16 g-line-height-1_2">7.</span>
                      Stock
                    </h5>
                    <div class="u-accordion__body g-color-gray-dark-v4">
                      <p>Si ante una garantía no se cuenta con la misma pieza de recambio en stock, se efectuara una nota de crédito por el valor actual de mismo.</p>
                    </div>
                  </div>
                  <!-- end own card -->


                </div>
                <!-- End Accordion -->
              </div>

              <div class="tab-pane fade" id="nav-5-3-primary-ver--3" role="tabpanel" aria-expanded="false"   >
                <h3 class="h5 g-color-gray-dark-v2 g-mb-30">Retiro de mercaderia del R.M.A.</h3>

                <div class="card g-brd-none">
                  CONDICIONES INDISPENSABLES PARA RECIBIR PRODUCTOS EN GARANTIA <br>
                  NO OMITA NINGUN PUNTO NI DUDE EN CONSULTARNOS VIA EMAIL O TELEFONICAMENTE AL:<br>
                  Mail: soporte@proctecno.com <br>
                  Tel: 1169661866 <br>
                  <br>
                  - Presentarse en la oficina dentro del horario de atención, Lunes a Viernes de 10.00hs a 20:00hs y Sábados 10 a 18:00hs
                </div>

                <!-- own card -->
                <div class="card g-brd-none">
                  <br>
                  <h5 class="g-color-gray-dark-v4">
                    <span class="g-color-primary g-font-weight-700 g-font-size-16 g-line-height-1_2">8.</span>
                    Orden de reparación.
                  </h5>
                  <div class="u-accordion__body g-color-gray-dark-v4">
                    <p>Para retirar mercadería de R.M.A., será OBLIGATORIO presentar la correspondiente orden de reparación de la misma, SIN EXCEPCION ALGUNA.</p>
                  </div>
                </div>
                <!-- end own card -->

                <!-- own card -->
                <div class="card g-brd-none">
                  <h5 class="g-color-gray-dark-v4">
                    <span class="g-color-primary g-font-weight-700 g-font-size-16 g-line-height-1_2">9.</span>
                    Aceptación y cumplimiento de garantía.
                  </h5>
                  <div class="u-accordion__body g-color-gray-dark-v4">
                    <p>El retiro de la mercadería de la oficina implica la aceptación y cumplimiento de las garantías vigentes en vuestro conocimiento.</p>
                  </div>
                </div>
                <!-- end own card -->
              </div>

              <div class="tab-pane fade" id="nav-5-3-primary-ver--4" role="tabpanel" aria-expanded="false"   >
                <h3 class="h5 g-color-gray-dark-v2 g-mb-30">Plazos de garantías.</h3>

                <div class="card g-brd-none">
                  CONDICIONES INDISPENSABLES PARA RECIBIR PRODUCTOS EN GARANTIA <br>
                  NO OMITA NINGUN PUNTO NI DUDE EN CONSULTARNOS VIA EMAIL O TELEFONICAMENTE AL:<br>
                  Mail: soporte@proctecno.com <br>
                  Tel: 1169661866 <br>
                  <br>
                  - Presentarse en la oficina dentro del horario de atención, Lunes a Viernes de 10.00hs a 20:00hs y Sábados 10 a 18:00hs
                </div>



                <!-- own card -->
                <div class="card g-brd-none">
                  <br>
                  <h5 class="g-color-gray-dark-v4">
                    <span class="g-color-primary g-font-weight-700 g-font-size-16 g-line-height-1_2">10.</span>
                    Informática.
                  </h5>
                  <div class="u-accordion__body g-color-gray-dark-v4">
                    <p>Mother. Memorias, Hd. Floppy, Placas de video y otros artículos 6 meses con nosotros, después depende exclusivamente la garantía de fábrica correspondiente a cada producto por lo que deberá dirigirse al fabricante.</p>
                  </div>
                </div>
                <!-- end own card -->

                <!-- own card -->
                <div class="card g-brd-none">
                  <h5 class="g-color-gray-dark-v4">
                    <span class="g-color-primary g-font-weight-700 g-font-size-16 g-line-height-1_2">11.</span>
                    Equipos armados.
                  </h5>
                  <div class="u-accordion__body g-color-gray-dark-v4">
                    <p>CPU´s armados en la empresa 1 año de garantía. Los accesorios que salen con el equipo sus garantías son de 6 meses.</p>
                  </div>
                </div>
                <!-- end own card -->

                <!-- own card -->
                <div class="card g-brd-none">
                  <h5 class="g-color-gray-dark-v4">
                    <span class="g-color-primary g-font-weight-700 g-font-size-16 g-line-height-1_2">12.</span>
                    Monitores e impresoras
                  </h5>
                  <div class="u-accordion__body g-color-gray-dark-v4">
                    <p>La garantía de los mismos será directamente en el soporte del fabricante.</p>
                  </div>
                </div>
                <!-- end own card -->

                <!-- own card -->
                <div class="card g-brd-none">
                  <h5 class="g-color-gray-dark-v4">
                    <span class="g-color-primary g-font-weight-700 g-font-size-16 g-line-height-1_2">13.</span>
                    Estado del producto.
                  </h5>
                  <div class="u-accordion__body g-color-gray-dark-v4">
                    <p>La garantía de los mismos no aceptará equipos dañados por sobretemperatura y/o sobrecargas eléctricas de línea o del tipo atmosféricas.</p>
                  </div>
                </div>
                <!-- end own card -->







              </div>

              <div class="tab-pane fade" id="nav-5-3-primary-ver--5" role="tabpanel"   >
                <h3 class="h5 g-color-gray-dark-v2 g-mb-30">Returns &amp; Refunds</h3>

                <!-- Accordion -->
                <div id="accordion-12-5" class="u-accordion u-accordion-color-primary" role="tablist" aria-multiselectable="true">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                </div>
                <!-- End Accordion -->
              </div>

              <div class="tab-pane fade" id="nav-5-3-primary-ver--6" role="tabpanel"   >
                <h3 class="h5 g-color-gray-dark-v2 g-mb-30">Shipping Policies</h3>

                <!-- Accordion -->
                <div id="accordion-12-6" class="u-accordion u-accordion-color-primary" role="tablist" aria-multiselectable="true">

                </div>
                <!-- End Accordion -->
              </div>

              <div class="tab-pane fade" id="nav-5-3-primary-ver--7" role="tabpanel"   >
                <h3 class="h5 g-color-gray-dark-v2 g-mb-30">Other Topics</h3>

                <!-- Accordion -->
                <div id="accordion-12-7" class="u-accordion u-accordion-color-primary" role="tablist" aria-multiselectable="true">



                </div>
                <!-- End Accordion -->
              </div>

              <div class="tab-pane fade" id="nav-5-3-primary-ver--8" role="tabpanel"   >
                <h3 class="h5 g-color-gray-dark-v2 g-mb-30">Need more help?</h3>

                <!-- Accordion -->
                <div id="accordion-12-8" class="u-accordion u-accordion-color-primary" role="tablist" aria-multiselectable="true">

                </div>
                <!-- End Accordion -->
              </div>
            </div>
            <!-- End Tab panes -->
          </div>
        </div>






    </div>
</section>

<section>

  <div class="text-center mx-auto g-max-width-600 g-mb-50">
    <h4 class="g-color-black mb-4">Tenés alguna duda?</h4>
    <p class="lead">No te preocupes. Nuestro equipo puede ayudarte. Contactate!</p>
    <p><a href="{{route('frontend.contact')}}" class="btn-primary btn">Ir a formulario de contacto.</a></p>
  </div>

</section>




@endsection
