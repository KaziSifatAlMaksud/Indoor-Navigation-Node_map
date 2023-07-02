package com.example.myapplication;

import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.graphics.Path;
import android.util.AttributeSet;
import android.view.View;

public class MyCanvas extends View {
    private Bitmap backgroundImage;
    private Canvas canvas;
    private float zoomFactor = 1.0f;
    private float translateX = 0.0f;
    private float translateY = 0.0f;
    private Paint paint;
    private Path roadPath;

    public MyCanvas(Context context) {
        super(context);
        init();
    }

    public MyCanvas(Context context, AttributeSet attrs) {
        super(context, attrs);
        init();
    }

    private void init() {
        // Initialize paint object with desired properties
        paint = new Paint();
        paint.setColor(Color.RED);
        paint.setStyle(Paint.Style.FILL);
        paint.setAntiAlias(true);

        // Initialize path object
        roadPath = new Path();
    }

    public void setBackgroundImage(Bitmap bitmap) {
        backgroundImage = bitmap;
        canvas = new Canvas(backgroundImage);
    }

    public Canvas getCanvas() {
        return canvas;
    }

    public Bitmap getBitmap() {
        return backgroundImage;
    }

    public void setPath(Path path, Paint pathPaint) {
        roadPath = path;
        paint = pathPaint;
        invalidate();
    }

    @Override
    protected void onDraw(Canvas canvas) {
        super.onDraw(canvas);

        // Apply zooming and translation transformations
        canvas.scale(zoomFactor, zoomFactor);
        canvas.translate(translateX, translateY);

        // Draw the background image
        if (backgroundImage != null) {
            canvas.drawBitmap(backgroundImage, 0, 0, null);
        }
        // Draw your content on the canvas
        canvas.drawCircle(getWidth() - 40, getHeight() - 40, 20, paint);
        canvas.drawCircle(getWidth() - 40, getHeight() - 200, 20, paint);
        canvas.drawCircle(getWidth() - 200, getHeight() - 200, 20, paint);
        canvas.drawCircle(getWidth() - 300, getHeight() - 200, 20, paint);
        canvas.drawCircle(getWidth() - 400, getHeight() - 200, 20, paint);
        canvas.drawCircle(getWidth() - 500, getHeight() - 300, 20, paint);
        canvas.drawCircle(getWidth() - 500, getHeight() - 400, 20, paint);
        canvas.drawCircle(getWidth() - 500, getHeight() - 600, 20, paint);
        canvas.drawCircle(getWidth() - 600, getHeight() - 600, 20, paint);
        canvas.drawCircle(getWidth() - 500, getHeight() - 600, 20, paint);
        canvas.drawCircle(getWidth() - 600, getHeight() - 800, 20, paint);
        canvas.drawCircle(getWidth() - 600, getHeight() - 900, 20, paint);
        canvas.drawCircle(getWidth() - 1000, getHeight() - 900, 20, paint);
        canvas.drawCircle(getWidth() - 1000, getHeight() - 1100, 20, paint);
        canvas.drawCircle(getWidth() - 1000, getHeight() - 1300, 20, paint);
        canvas.drawCircle(getWidth() - 1200, getHeight() - 1200, 20, paint);
        canvas.drawCircle(getWidth() - 1300, getHeight() - 1400, 20, paint);
        canvas.drawCircle(getWidth() - 1400, getHeight() - 1500, 20, paint);
        canvas.drawCircle(getWidth() - 1500, getHeight() - 1600, 20, paint);
        canvas.drawCircle(getWidth() - 1000, getHeight() - 1700, 20, paint);
        canvas.drawCircle(getWidth() - 900, getHeight() - 1700, 20, paint);
        canvas.drawCircle(getWidth() - 800, getHeight() - 1700, 20, paint);
        canvas.drawCircle(getWidth() - 700, getHeight() - 1700, 20, paint);
        canvas.drawCircle(getWidth() - 500, getHeight() - 1700, 20, paint);
        canvas.drawCircle(getWidth() - 300, getHeight() - 1700, 20, paint);
        canvas.drawCircle(getWidth() - 700, getHeight() - 1600, 20, paint);
        canvas.drawCircle(getWidth() - 500, getHeight() - 1500, 20, paint);
        canvas.drawCircle(getWidth() - 300, getHeight() - 1300, 20, paint);
    }

    public void zoomIn() {
        zoomFactor += 0.1f; // Adjust the increment as per your preference
        translateX = getWidth() * (1 - zoomFactor) / 2;
        translateY = getHeight() * (1 - zoomFactor) / 2;
        invalidate();
    }

    public void zoomOut() {
        zoomFactor -= 0.1f; // Adjust the decrement as per your preference
        translateX = getWidth() * (1 - zoomFactor) / 2;
        translateY = getHeight() * (1 - zoomFactor) / 2;
        invalidate();
    }
}
