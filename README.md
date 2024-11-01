

### 1. Instalar Git
- **Selecciona el sistema operativo**: Ve a la página de descargas de Git y selecciona tu sistema operativo (Windows, macOS, Linux).
- **Selecciona la versión adecuada**: Generalmente, las computadoras modernas son de 64 bits, así que asegúrate de descargar la versión correcta.
- **Instalación**: Sigue las instrucciones del instalador para completar la instalación de Git en tu computadora.
- **Enlace de descarga**: [Descargar Git](https://git-scm.com/downloads).

### 2. Configurar Git en Visual Studio Code
- **Iniciar sesión en Visual Studio Code**: Abre Visual Studio Code y asegúrate de estar logueado con tu cuenta de GitHub.
- **Configurar el usuario en Git**:
  - Abre la terminal de bash en Visual Studio Code.
  - Ejecuta los siguientes comandos para configurar tu nombre de usuario y correo electrónico:
    ```bash
    git config user.name "tu_nombre_de_usuario"
    git config user.email "tu_correo_electronico@gmail.com"
    ```
  - **Nota**: Asegúrate de que el nombre de usuario y el correo electrónico coincidan con los de tu cuenta de GitHub.

### 3. Clonar el Repositorio
- **Abrir la terminal de Git Bash**: Puedes abrir Git Bash desde el menú de inicio o desde Visual Studio Code.
- **Clonar el repositorio**: Ejecuta el siguiente comando para clonar el repositorio en tu computadora:
  ```bash
  git clone https://github.com/DeivisJVC/Sistema-Integrado-Promosalud.git
  ```
- **Verificar la clonación**: Una vez clonado, deberías ver una nueva carpeta con el nombre del repositorio en tu sistema de archivos.

### 4. Subir Cambios Realizados en el Proyecto
- **Crear una nueva rama**: Antes de realizar cambios, crea una nueva rama para trabajar en ella. El nombre de la rama debe proporcionar un contexto sobre los cambios que vas a realizar:
  ```bash
  git checkout -b nombre_de_la_Rama
  ```
- **Agregar los cambios**: Después de realizar tus cambios, agrega los archivos modificados al área de preparación:
  ```bash
  git add .
  ```
- **Hacer un commit**: Crea un commit con un mensaje descriptivo que explique los cambios realizados:
  ```bash
  git commit -m "Descripción_de_los_cambios"
  ```
- **Subir la rama al repositorio remoto**: Sube tu rama al repositorio remoto en GitHub:
  ```bash
  git push --set-upstream origin nombre_de_la_Rama
  ```

### 5. Actualizar Cambios
- **Actualizar tu repositorio local**: Una vez que tus cambios sean aceptados, puedes actualizar tu repositorio local para reflejar los cambios del repositorio remoto:
  ```bash
  git pull
  ```

### 6. Solución de Problemas
- **Buscar ayuda**: Si encuentras problemas, primero intenta investigar y ver videos tutoriales. Un buen desarrollador sabe cómo buscar información y resolver problemas por sí mismo.
- **Comunidad de Discord**: Si después de investigar sigues teniendo problemas, no dudes en escribir a la comunidad de Discord para obtener ayuda.

### Recursos Adicionales
- **Curso en YouTube**: Para mayor contexto y aprendizaje, puedes seguir este [curso en YouTube](https://youtu.be/T3roQrB_Jko?si=VOclPp0AY5P5L1Bk).

Espero que esta guía más detallada te sea útil. ¡Buena suerte con tu proyecto! 🚀

Para mayor contexto y aprendizaje, pueden guiarte con este [curso en YouTube](https://youtu.be/T3roQrB_Jko?si=VOclPp0AY5P5L1Bk). ¡Nosotros podemos Cazadores de Software! 🚀
