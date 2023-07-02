package com.example.myapplication;

import android.graphics.Bitmap;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.graphics.Path;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.Button;
import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {
    private MyCanvas myCanvas;
    private Button btnZoomIn;
    private Button btnZoomOut;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
       setContentView(R.layout.activity_main);
        btnZoomIn = findViewById(R.id.btnZoomIn);
        btnZoomOut = findViewById(R.id.btnZoomOut);

        myCanvas = findViewById(R.id.myCanvas);
        // Set initial background image for MyCanvas
        Bitmap backgroundBitmap = Bitmap.createBitmap(500, 500, Bitmap.Config.ARGB_8888);
        myCanvas.setBackgroundImage(backgroundBitmap);

        // Set click listeners for the zoom in and zoom out buttons
        btnZoomIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                myCanvas.zoomIn();
            }
        });

        btnZoomOut.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                myCanvas.zoomOut();
            }
        });

        Paint paint = new Paint();
        paint.setColor(Color.RED);
        paint.setStrokeWidth(10);
        paint.setStyle(Paint.Style.STROKE);

        Path roadPath = new Path();
        roadPath.moveTo(100, 100); // Starting point
        roadPath.lineTo(300, 200); // Intermediate point
        roadPath.lineTo(500, 150); // End point

        myCanvas.setPath(roadPath, paint);
    }
}
