<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'review_message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Testimonial::create([
            'user_id' => Auth::id(), // Can be null if not logged in
            'customer_name' => $validatedData['customer_name'],
            'review_message' => $validatedData['review_message'],
            'rating' => $validatedData['rating'],
        ]);

        return back()->with('success', 'Thank you for your review!');
    }

    public function homepage()
    {
        $testimonials = Testimonial::latest()->take(5)->get()->map(function ($t) {
            return [
                'review_message' => $t->review_message,
                'customer_name' => $t->customer_name,
                'rating' => $t->rating,
            ];
        });

        return view('welcome', compact('testimonials'));
    }
}
