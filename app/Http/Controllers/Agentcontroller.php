<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Agentcontroller extends Controller
{
  public function AgentDashboard() {
    return view ('agent.agentdash');
  }
}
