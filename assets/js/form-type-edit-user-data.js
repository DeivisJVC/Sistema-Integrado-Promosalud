fetch("/php/getUserData.php")
  .then((response) => response.json())
  .then((data) => {
    if (data.error) {
      console.error("Error:", data.error);
    } else {
      const formType = document.getElementById("profileForm");
      if (formType) {
        if (rol == "empresa") {
          formType.innerHTML = `
            <form id="profileForm" action="../php/edit-data-user.php" method="POST" enctype="multipart/form-data" id="multiStepForm" class="needs-validation form_type_empresa" novalidate>
              <div class="row mb-4">
                <div class="col-md-3 text-center mt-3 mb-md-0">
                  <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center mx-auto mb-5 mt-3 "
                    style="width: 128px; height: 128px;">
                    <img src="${
                      data.img ? data.img : "/assets/img/img_users/default.svg"
                    }" class="rounded-circle border" width="250" height="210" alt="Foto de perfil">
                  </div>
                  <input type="file" class="form-control mt-2 d-none" id="img" name="img" accept="image/*">
                  <button type="button" class="btn btn-outline-primary mt-4 ms-3 cambiar-foto " onclick="document.getElementById('img').click()">Cambiar foto</button>
                  <button type="submit" name="quitar_foto" value="1" class="btn btn-outline-secondary mt-4 ms-3 quitar-foto">Quitar foto</button>
                </div>

                <div class="col-md-9">
                  <div class="mb-3 nombres">
                    <label for="nombre" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                      value="${data.nombre || ""}" required>
                    <div class="valid-feedback">Excelente!</div>
                    <div class="invalid-feedback">Por favor, ingrese sus nombre</div>
                  </div>
                  <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" value="${
                      data.telefono || ""
                    }" required>
                    <div class="valid-feedback">Excelente!</div>
                    <div class="invalid-feedback">Por favor, ingrese su número de teléfono</div>
                  </div>
                </div>
                <input type="hidden" name="rut" value="${data.rut || ""}">
                <input type="hidden" name="esta" value="${data.estado || ""}">

                <div class="mb-3">
                  <label for="ciudad" class="form-label">Ciudad</label>
                  <input class="form-control" id="ciudad" name="ciudad" type="text" value="${
                    data.ciudad || ""
                  }" required>
                  <div class="valid-feedback">Excelente!</div>
                  <div class="invalid-feedback">Por favor, ingrese su ciudad</div>
                </div>

                <div class="mb-3">
                  <label for="direccion" class="form-label">Dirección</label>
                  <input class="form-control" id="direccion" name="direccion" type="text" value="${
                    data.direccion || ""
                  }" required>
                  <div class="valid-feedback">Excelente!</div>
                  <div class="invalid-feedback">Por favor, ingrese su dirección</div>
                </div>

                <div class="mb-3">
                  <label for="correo" class="form-label">Correo Electrónico</label>
                  <input class="form-control" id="correo" name="correo" type="email" value="${
                    data.correo || ""
                  }" required>
                  <div class="valid-feedback">Excelente!</div>
                  <div class="invalid-feedback">Por favor, ingrese su correo electrónico</div>
                </div>

                <div class="mb-3">
                  <label for="sector" class="form-label">Sector</label>
                  <input class="form-control" id="sector" name="sector" type="text" value="${
                    data.sector || ""
                  }" required>
                  <div class="valid-feedback">Excelente!</div>
                  <div class="invalid-feedback">Por favor, ingrese su sector</div>
                </div>

                <div class="d-flex justify-content-between pt-3">
                  <button type="submit" class="btn btn-primary flex-grow-1 me-2">Guardar Cambios</button>
                  <a href="Menu_cita.php" class="btn btn-secondary flex-grow-1 ms-2">Cancelar</a>
                </div>
            </form>
          `;
        } else if (rol == "administrador") {
          formType.innerHTML = `
            <form id="profileForm" action="../php/edit-data-user.php" method="POST" enctype="multipart/form-data" id="multiStepForm"
            class="needs-validation form_type_empresa" novalidate>
            <div class="row mb-4">
              <div class="col-md-3 text-center mt-3 mb-md-0">
                <div
                  class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center mx-auto mb-5 mt-3 "
                  style="width: 128px; height: 128px;">
                  <img src="${
                    data.img ? data.img : "/assets/img/img_users/default.svg"
                  }" class="rounded-circle border" width="250" height="210" alt="Foto de perfil">
                </div>
                <input type="file" class="form-control mt-2 d-none" id="img" name="img" accept="image/*">

                <button type="button" class="btn btn-outline-primary mt-4 ms-3 cambiar-foto "
                  onclick="document.getElementById('img').click()">Cambiar foto</button>
                <button type="submit" name="quitar_foto" value="1" class="btn btn-outline-secondary mt-4 ms-3 quitar-foto">Quitar
                  foto</button>

              </div>

              <div class="col-md-9">
                <div class="mb-3 nombres">
                  <label for="nombre" class="form-label">Nombres</label>
                  <input type="text" class="form-control" id="nombre" name="nombre"
                    value="${data.nombres || ""}" required>
                  <div class="valid-feedback">Excelente!</div>
                  <div class="invalid-feedback">Por favor, ingrese sus nombre</div>
                </div>
                <div class="mb-3">
                  <label for="cargo" class="form-label">Cargo</label>
                  <input type="text" class="form-control" id="cargo" name="cargo"
                    value="${data.cargo || ""}" required>
                  <div class="valid-feedback">Excelente!</div>
                  <div class="invalid-feedback">Por favor, ingrese su cargo</div>
                </div>
                <input type="hidden" name="rut" value="${
                  data.numero_documento || ""
                }">
                <input type="hidden" name="esta" value="${data.estado || ""}">


                <div class="mb-3">
                  <label for="telefono" class="form-label">Teléfono</label>
                  <input type="tel" class="form-control" id="telefono" name="telefono"
                    value="${data.telefono || ""}" required>
                  <div class="valid-feedback">Excelente!</div>
                  <div class="invalid-feedback">Por favor, ingrese su número de teléfono</div>
                </div>

                <div class="mb-3">
                  <label for="correo" class="form-label">Correo Electrónico</label>
                  <input class="form-control" id="correo" name="correo" type="email"
                    value="${data.correo || ""}" required>
                  <div class="valid-feedback">Excelente!</div>
                  <div class="invalid-feedback">Por favor, ingrese su correo electrónico</div>
                </div>
                
                <div class="d-flex justify-content-between pt-3">
                  <button type="submit" class="btn btn-primary flex-grow-1 me-2">Guardar Cambios</button>
                  <a href="Menu_cita.php" class="btn btn-secondary flex-grow-1 ms-2">Cancelar</a>
                </div>
            </form>
          `;
        } else if (rol == "paciente") {
          formType.innerHTML = `
            <form id="profileForm" action="../php/edit-data-user.php" method="POST" enctype="multipart/form-data" id="multiStepForm" class="needs-validation form_type" novalidate>
              <div class="row mb-4">
                <div class="col-md-3 text-center mt-3 mb-md-0">
                  <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center mx-auto mb-5 mt-3 "
                    style="width: 128px; height: 128px;">
                    <img src="${
                      data.img ? data.img : "/assets/img/img_users/default.svg"
                    }" class="rounded-circle border" width="250" height="210" alt="Foto de perfil">
                  </div>
                  <input type="file" class="form-control mt-2 d-none" id="img" name="img" accept="image/*">

                  <button type="button" class="btn btn-outline-primary mt-4 ms-3 cambiar-foto " onclick="document.getElementById('img').click()">Cambiar foto</button>
                  <button type="submit" name="quitar_foto" value="1" class="btn btn-outline-secondary mt-4 ms-3 quitar-foto">Quitar foto</button>

                </div>

                <div class="col-md-9">
                  <div class="mb-3 nombres">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres"
                      value="${data.nombres || ""}" required>
                    <div class="valid-feedback">Excelente!</div>
                    <div class="invalid-feedback">Por favor, ingrese sus nombre</div>
                  </div>
                  <div class="mb-3 apellidos">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos"
                      value="${data.apellidos || ""}" required>
                    <div class="valid-feedback">Excelente!</div>
                    <div class="invalid-feedback">Por favor, ingrese sus apellidos</div>
                  </div>
                </div>
                <input type="hidden" name="numero_documento" value="${
                  data.numero_documento || ""
                }">


                <div class="mb-3">
                  <label for="ocupacion" class="form-label">Ocupación</label>
                  <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="${
                    data.ocupacion || ""
                  }" required>
                  <div class="valid-feedback">Excelente!</div>
                  <div class="invalid-feedback">Por favor, ingrese su ocupación</div>
                </div>

                <div class="mb-3">
                  <label for="telefono" class="form-label">Teléfono</label>
                  <input type="tel" class="form-control" id="telefono" name="telefono" value="${
                    data.telefono || ""
                  }" required>
                  <div class="valid-feedback">Excelente!</div>
                  <div class="invalid-feedback">Por favor, ingrese su número de teléfono</div>
                </div>

                <div class="mb-3">
                  <label for="ciudad" class="form-label">Ciudad</label>
                  <input class="form-control" id="ciudad" name="ciudad" type="text" value="${
                    data.ciudad || ""
                  }" required>
                  <div class="valid-feedback">Excelente!</div>
                  <div class="invalid-feedback">Por favor, ingrese su ciudad</div>
                </div>

                <div class="mb-3">
                  <label for="direccion" class="form-label">Dirección</label>
                  <input class="form-control" id="direccion" name="direccion" type="text" value="${
                    data.direccion || ""
                  }" required>
                  <div class="valid-feedback">Excelente!</div>
                  <div class="invalid-feedback">Por favor, ingrese su dirección</div>
                </div>

                <div class="mb-3">
                  <label for="correo" class="form-label">Correo Electrónico</label>
                  <input class="form-control" id="correo" name="correo" type="email" value="${
                    data.correo || ""
                  }" required>
                  <div class="valid-feedback">Excelente!</div>
                  <div class="invalid-feedback">Por favor, ingrese su correo electrónico</div>
                </div>

                <div class="d-flex justify-content-between pt-3">
                  <button type="submit" class="btn btn-primary flex-grow-1 me-2">Guardar Cambios</button>
                  <a href="Menu_cita.php" class="btn btn-secondary flex-grow-1 ms-2">Cancelar</a>
                </div>
            </form>
          `;
        }
      }
    }
  }).catch((error) => console.error("Error en la petición:", error));
