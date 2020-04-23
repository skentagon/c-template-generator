
cmake_minimum_required(VERSION 2.8)

project(MediaEditor CXX)

add_executable(MediaEditor main.cpp)

target_link_libraries(MediaEditor
  GL
  glfw
)