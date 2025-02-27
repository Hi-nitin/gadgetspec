<?php
namespace App\Http\Controllers;

use App\Models\NewsArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsArticleController extends Controller
{
    public function index(Request $request)
{
    $newsArticles = NewsArticle::paginate(8);

    return response()->json([
        'message' => 'News articles retrieved successfully!',
        'data' => $newsArticles->items(),
        'current_page' => $newsArticles->currentPage(),
        'last_page' => $newsArticles->lastPage(),
        'has_more_pages' => $newsArticles->hasMorePages(),
    ], 200);
}


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'additional_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $mainImagePath = $request->file('main_image')->store('news_images', 'public');
            $mainImageUrl = Storage::url($mainImagePath);

            $additionalImagesPaths = [];
            if ($request->hasFile('additional_images')) {
                foreach ($request->file('additional_images') as $image) {
                    $additionalImagePath = $image->store('news_images', 'public');
                    $additionalImagesPaths[] = Storage::url($additionalImagePath);
                }
            }

            $newsArticle = NewsArticle::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'main_image' => $mainImageUrl,
                'additional_images' => $additionalImagesPaths,
            ]);

            return response()->json([
                'message' => 'News article saved successfully!',
                'data' => $newsArticle,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to save news article.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
