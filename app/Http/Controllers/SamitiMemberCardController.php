<?php

namespace App\Http\Controllers;

use App\Models\SamitiMemberCard;
use App\Models\Samiti;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SamitiMemberCardController extends Controller
{
    public function index($samiti_slug)
    {
        $samiti = Samiti::where('slug', $samiti_slug)->first();
        $member_card = SamitiMemberCard::where('samiti_id', $samiti->id)
            ->oldest()
            ->paginate(20);
        return view('admin.samiti.member-card.index', compact("member_card", "samiti"));

    }

    public function create($samiti_slug)
    {
        $samiti = Samiti::where('slug', $samiti_slug)->first();
        return view('admin.samiti.member-card.create', compact("samiti"));
    }

    public function store(Request $request)
    {
        $member = new SamitiMemberCard;
        $member->samiti_id = $request->samiti_id;
        $member->name = $request->name;
        $member->designation = $request->designation;
        $member->email = $request->email;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/samitis/', $filename);
            $member->image = $filename;
        }
        if ($request->status) {
            $member->status = "on";
        } else {
            $member->status = "off";
        }
        $member->save();
        return redirect()->route('samiti-member-card.index', $request->samiti_slug)->with('success', 'New Member has been added successfully');
    }

    public function edit($id, $samiti_slug)
    {
        $member = SamitiMemberCard::find($id);
        $samiti = Samiti::where('slug', $samiti_slug)->first();
        return view('admin.samiti.member-card.edit', compact('member', 'samiti'));
    }

    public function update(Request $request)
    {
        $member = SamitiMemberCard::find($request->id);
        $member->name = $request->name;
        $member->designation = $request->designation;
        $member->email = $request->email;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/samitis/', $filename);
            $member->image = $filename;
        }
        if ($request->status) {
            $member->status = "on";
        } else {
            $member->status = "off";
        }
        $member->update();
        return redirect()->route('samiti-member-card.index', $request->samiti_slug)->with('success', 'Member has been updated successfully');
    }

    public function changeStatus($id)
    {
        $member = SamitiMemberCard::find($id);
        if ($member->status == 'on') {
            $member->status = 'off';
        } elseif ($member->status == 'off') {
            $member->status = 'on';
        }
        $member->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    public function destroy(Request $request, $id)
    {
        $member = SamitiMemberCard::find($id);
        $member->delete();
        return back()->with('success', 'Member has been removed successfully');
    }
}
