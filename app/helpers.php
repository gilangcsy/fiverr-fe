<?php

function devHost() {
  return env('API_DEV_HOST', 'http://localhost:3000/api/v1');
}
