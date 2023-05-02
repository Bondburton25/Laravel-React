<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use Auth;

class ProjectController extends Controller
{
  public function index()
  {
    return view('project.index', ['projects' => project::all()]);
  }

    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        $project = new Project;
        $project->name = $request->name;
        // $project->number = '002';
        $project->customer  = $request->customer;
        $project->address   = $request->address;
        $project->longitude = $request->longitude;
        $project->latitude  = $request->latitude;
        $project->save();
        $flexMessageDataJson = '{
            "type": "flex",
            "altText": "Flex Message",
            "contents":{
                "type": "bubble",
                "hero": {
                  "type": "image",
                  "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_3_movie.png",
                  "size": "full",
                  "aspectRatio": "20:13",
                  "aspectMode": "cover",
                  "action": {
                    "type": "uri",
                    "uri": "http://linecorp.com/"
                  }
                },
                "body": {
                  "type": "box",
                  "layout": "vertical",
                  "spacing": "md",
                  "contents": [
                    {
                      "type": "text",
                      "text": "'.$project->name.'",
                      "wrap": true,
                      "weight": "bold",
                      "gravity": "center",
                      "size": "xl"
                    },
                    {
                      "type": "box",
                      "layout": "vertical",
                      "margin": "lg",
                      "spacing": "sm",
                      "contents": [
                        {
                          "type": "box",
                          "layout": "baseline",
                          "spacing": "sm",
                          "contents": [
                            {
                              "type": "text",
                              "text": "Date",
                              "color": "#aaaaaa",
                              "size": "sm",
                              "flex": 1
                            },
                            {
                              "type": "text",
                              "text": "date",
                              "wrap": true,
                              "size": "sm",
                              "color": "#666666",
                              "flex": 4
                            }
                          ]
                        },
                        {
                          "type": "box",
                          "layout": "baseline",
                          "spacing": "sm",
                          "contents": [
                            {
                              "type": "text",
                              "text": "ที่ตั้ง",
                              "color": "#aaaaaa",
                              "size": "sm",
                              "flex": 1
                            },
                            {
                              "type": "text",
                              "text": "'.$project->address.'",
                              "wrap": true,
                              "color": "#666666",
                              "size": "sm",
                              "flex": 4
                            }
                          ]
                        },
                        {
                          "type": "box",
                          "layout": "baseline",
                          "spacing": "sm",
                          "contents": [
                            {
                              "type": "text",
                              "text": "Owner",
                              "color": "#aaaaaa",
                              "size": "sm",
                              "flex": 1
                            },
                            {
                              "type": "text",
                              "text": "'.$project->customer.'",
                              "wrap": true,
                              "color": "#666666",
                              "size": "sm",
                              "flex": 4
                            }
                          ]
                        }
                      ]
                    },
                    {
                      "type": "box",
                      "layout": "vertical",
                      "margin": "xl",
                      "contents": [
                        {
                          "type": "image",
                          "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/linecorp_code_withborder.png",
                          "aspectMode": "cover",
                          "size": "sm",
                          "margin": "md"
                        }
                      ]
                    }
                  ]
                }
            }
        }';

        $datas['url'] = "https://api.line.me/v2/bot/message/push";

        // Location
        $mapFlexMessageDataJson = '{
            "type": "location",
            "title": "'.__('ที่ตั้งของโครงการ').' '. $project->name.'",
            "address": "'.$request->address.'",
            "latitude": "'.$request->latitude.'",
            "longitude": "'.$request->longitude.'"
        }';

        $flexDataJsonDeCode           = json_decode($flexMessageDataJson,true);
        $mapFlexMessageDataJsonDeCode = json_decode($mapFlexMessageDataJson,true);

        $messages['to'] = $request->lineUserid;        

        $messages['messages'][] = $flexDataJsonDeCode;
        $messages['messages'][] = $mapFlexMessageDataJsonDeCode;

        $encodeJson = json_encode($messages);
        $this->pushFlexMessage($encodeJson,$datas);

        // Reply message
        $message["type"] = "text";
        $message["text"] = "คุณได้สร้างโครงการใหม่ชื่อ $project->name";
        $lineMessage["messages"][0] = $message;
        $lineMessage['to'] = Auth::user()->auth_provider->provider_id;
        $this->putMessageLine($lineMessage,'push');

        // Sending Line Notify
        $messageToNotify = Auth::user()->name .' '.__('ได้สร้าง Project') .' '.$project->name.'';
        $this->sendLineNotify($messageToNotify);
        return redirect()->back()->with('success', 'Project was created');
    }
}
