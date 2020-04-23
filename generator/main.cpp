
#include <GLFW/glfw3.h>
#include <iostream>
#include "./util/log.hpp"
#include "main.hpp"

const int g_width  = 640;
const int g_height = 480;



int main() {

  using skentagon::mediaeditor::trl;

  // init GLFW
  if( !glfwInit() ){
    trl.err() << "Failed to initialize glfw." << std::endl;
    std::exit(EXIT_FAILURE);
  }
  
  glfwSetErrorCallback(skentagon::mediaeditor::glfwErrorCallback);

  // create window
  GLFWwindow* window = glfwCreateWindow(g_width, g_height, "Simple", NULL, NULL);
  if (!window) {
    trl.err() << "Failed to create window." << std::endl;
    glfwTerminate();
    std::exit(EXIT_FAILURE);
  }

  glfwMakeContextCurrent(window);
  glfwSwapInterval(1);
  glClearColor(0.2f, 0.2f, 0.2f, 0.0f);
  
  // loop
  while( !glfwWindowShouldClose(window) ) {
      
    // clear buffer
    glClear(GL_COLOR_BUFFER_BIT);
    
    // swap buffers
    glfwSwapBuffers(window);

    // wait for events
    glfwWaitEvents();

  }
  
  glfwTerminate();
  
}